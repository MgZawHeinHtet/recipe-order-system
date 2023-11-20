<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view(
            'cart.cart',
            ["cart" => Cart::where('user_id',auth()->user()->id)->first()],
            ["categories"=>Category::all('name')]
        );
    }

    public function addToCart(Product $product)
    {
        
        $quantity = request()->quantity;
        $curr_user = auth()->user();
        $curr_user_id = $curr_user->id;

        //ONLY CREATE IF THE USER_ID DOES'T HAVE ON CART
        $cart = Cart::firstOrCreate([
            'user_id' => $curr_user_id
        ]);

        //to use model
        if(!$curr_user->cart_id){
            $curr_user->cart_id = $cart->id;
            $curr_user->update();
        }

        //CALL BACK
        $this->add_product_to_cart_item( $product, $quantity,$cart);

        return back();
    }

    public function add_product_to_cart_item( $product, $quantity,$cart)
    {
      
        
        //PRODUCT ID IS ALREADY EXIT IN CART_ITEM TABLES
        $is_product_exist_cart_item = CartItem::where('product_id', $product->id)->where('cart_id', $cart->id)->first();

        if (!$is_product_exist_cart_item) {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'total'=>$product->price
            ]); 
        } else {
            $is_product_exist_cart_item->quantity = $quantity;
            $is_product_exist_cart_item->total = $product->price*$quantity;
            $is_product_exist_cart_item->update();
        }
    }

    public function destory(CartItem $cart){
        $cart->delete();
        return back();
    }
}
