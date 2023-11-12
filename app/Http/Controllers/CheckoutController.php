<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutFormRequest;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\CssSelector\Node\FunctionNode;

class CheckoutController extends Controller
{
    public function index()
    {
        return view(
            'cart.checkout',
            [
                "payments" => Payment::all(),
                "cart_items" => auth()->user()->cart?->cart_items->load('product')
            ]
        );
    }

    public function store(CheckoutFormRequest $request)
    {

        $cleanData = $request->validated();

        $curr_user = auth()->user();

        $cleanData['user_id'] = $curr_user->id;
        

        //create customer
        $customer = Customer::create( $cleanData);

       
        $order =Order::create([
            'customer_id'=> $customer->id,
            'order_number' => 'order-'. mt_rand(1000,9999),
            'payment_id' => request()->payment,
            'order_date' => now(),
            'order_status' => 'pending'
        ]);

        // swap cart item to order item 
       
        $cartItems = Cart::where('user_id',$curr_user->id)->first()->cart_items->load('product');
        
        foreach($cartItems as $cartItem){
            OrderItems::create([
                'order_id' => $order->id,
                'product_id'=>$cartItem->product->id,
                'quantity'=>$cartItem->quantity,
                'total'=>$cartItem->total
            ]);
            $cartItem->delete();
        }
        
        return redirect('/home/cart')->with('success','Order Successfully');
    }
}
