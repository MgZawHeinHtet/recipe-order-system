<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutFormRequest;
use App\Mail\InvoiceMail;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Customer;
use App\Models\Notification as ModelsNotification;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Notification;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\CssSelector\Node\FunctionNode;

class CheckoutController extends Controller
{
    public function index()
    {
        return view(
            'cart.checkout',
            [
                "payments" => Payment::all(),
                "cart_items" => auth()->user()->cart?->cart_items->load('product'),
                "customer" => Customer::where('user_id',auth()->user()->id)->first()
            ]
        );
    }

    public function store()
    {

        $customer_id = request()->customer_id;

        $curr_user = auth()->user();

        if(!$customer_id){
            return back()->with('warning','Pls fill Your Info First');
        }

        $order = Order::create([
            'customer_id'=> $customer_id,
            'order_number' => '#N@ture-'. Str::random(6),
            'payment_id' => request()->payment,
            'order_date' => now(),
            'order_status_id' => 1
        ]);

        // swap cart item to order item 
       
        $cartItems = Cart::where('user_id',$curr_user->id)->first()->cart_items->load('product');
        
        
        foreach($cartItems as $cartItem){

            if($cartItem->quantity > $cartItem->product->stock){
                $order->delete();
                return redirect('/home/cart')->with('stock',$cartItem->product->title.' is out of stock!!');
                break;
            }else{
                $product = Product::find($cartItem->product->id);
                $product->stock -= $cartItem->quantity;
                $product->update();
            }

            OrderItems::create([
                'order_id' => $order->id,
                'product_id'=>$cartItem->product->id,
                'quantity'=>$cartItem->quantity,
                'total'=>$cartItem->total
            ]);
        }

        //delete all data from cart
        $curr_user->cart->cart_items()->delete();
      
        Mail::to($curr_user->email)->send(new InvoiceMail($order,$products = $cartItems));
        

        //send user noti to now success
        Notification::create([
            'user_id'=> $curr_user->id,
            'noti_type' => 'order-success',
            'is_read'=> false,
            'recipent_id'=> 1
        ]);

        
        return redirect()->route('checkout_success',['order'=>$order]);
    }

    public function success($order){
        $realOrder = Order::find($order);
        return view('order-success',[
            'order'=> $realOrder
        ]);
    }
}
