<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutFormRequest;
use App\Mail\InvoiceMail;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Coupons;
use App\Models\Customer;
use App\Models\Notification as ModelsNotification;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Notification;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification as NotificationsNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\CssSelector\Node\FunctionNode;

class CheckoutController extends Controller
{
    public function index()
    {
        $coupon_code = request()->coupon;

        return view(
            'cart.checkout',
            [
                "payments" => Payment::all(),
                "cart_items" => auth()->user()->cart?->cart_items->load('product'),
                "customer" => Customer::where('user_id', auth()->user()->id)->first(),
                "coupon" => Coupons::where('coupon_code', $coupon_code)?->get()->first()
            ]
        );
    }

    public function store()
    {

        $coupon = null;

        if ($coupon_code =  request()->coupon) {
            $coupon = Coupons::where('coupon_code', $coupon_code)?->get()->first();
            if (!$coupon->valid) {
                return back()->withErrors(['coupon' => 'coupon is already used.👍']);
            }
        }

        $customer_id = request()->customer_id;

        $curr_user = auth()->user();

        if (!$customer_id) {
            return back()->with('warning', 'Pls fill Your Info First');
        }

        $order = Order::create([
            'customer_id' => $customer_id,
            'order_number' => '#N@ture-' . Str::random(6),
            'payment_id' => request()->payment,
            'order_date' => now(),
            'order_status_id' => 1,
            'discount' => $coupon?->discount ?? 0
        ]);

        // swap cart item to order item 

        $cartItems = Cart::where('user_id', $curr_user->id)->first()->cart_items->load('product');


        foreach ($cartItems as $cartItem) {

            if ($cartItem->quantity > $cartItem->product->stock) {
                $order->delete();
                return redirect('/home/cart')->with('stock', $cartItem->product->title . ' is out of stock!!');
                break;
            } else {
                $product = Product::find($cartItem->product->id);
                $product->stock -= $cartItem->quantity;
                if ($product->stock < 1) {
                    Notification::sendNotiAdmin($curr_user->id, 'out-stock');
                }
                $product->update();
            }

            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product->id,
                'quantity' => $cartItem->quantity,
                'order_price' => $coupon ? $cartItem->product->price - ($cartItem->product->price * $coupon->discount / 100) : $cartItem->product->price,
                'total' => $coupon ?  $cartItem->total - ($cartItem->total*$coupon->discount/100) : $cartItem->total
            ]);
        }

        //coupon invalid
        if ($coupon) {
            $coupon->valid = false;
            $coupon->update();
        }

        //delete all data from cart
        $curr_user->cart->cart_items()->delete();

        Mail::to($curr_user->email)->send(new InvoiceMail($order, $products = $cartItems));


        //send user noti to now success
        Notification::create([
            'user_id' => $curr_user->id,
            'noti_type' => 'order-success',
            'is_read' => false,
            'recipent_id' => 1
        ]);

        Notification::sendNotiAdmin($curr_user->id, 'order-create');

        return redirect()->route('checkout_success', ['order' => $order]);
    }

    public function success($order)
    {
        $realOrder = Order::find($order);
        return view('order-success', [
            'order' => $realOrder
        ]);
    }
}
