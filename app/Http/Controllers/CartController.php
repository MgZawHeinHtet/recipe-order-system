<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Product $product){
        $quantity = request()->quantity ;
        $curr_user = auth()->user();
        $curr_user_id = $curr_user->id;
        
        //ONLY CREATE IF THE USER_ID DOES'T HAVE ON CART
        Cart::firstOrCreate([
            'user_id'=> $curr_user_id
        ]);

        //CALL BACK
        $this->add_product_to_cart_item($curr_user,$product,$quantity);

        return back();
    }

    public function add_product_to_cart_item($user,$product,$quantity){
        $user_cart = $user->cart;
       
        //PRODUCT ID IS ALREADY EXIT IN CART_ITEM TABLES
        $is_product_exist_cart_item = CartItem::where('product_id',$product->id)->where('cart_id',$user_cart->id)->first();

        if(!$is_product_exist_cart_item){
            CartItem::create([
                'cart_id' => $user_cart->id,
                'product_id' => $product->id,
                'quantity' => 1
            ]);
        }else{
            $is_product_exist_cart_item->quantity += $quantity ;
            $is_product_exist_cart_item->update();
        }
    }
}
