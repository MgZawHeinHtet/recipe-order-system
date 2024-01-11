<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use App\Models\SpecialProduct;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        $requests = request(['country','category','type']);
        return view('shop.index',[
            'categories'=>Category::get(),
            'latestProducts'=> Product::latest()->where('is_publish',1)->take(4)->get(),
            'priceProducts'=>Product::orderBy('price','desc')->where('is_publish',1)->take(4)->get(),
            'cart' => Cart::with('cart_items')->where('user_id',auth()->user()?->id)->first(),
            'countries'=>Country::all(),
            'products' => Product::latest()->filter($requests)->where('is_publish',1)->paginate(8)->withQueryString(),
            'specialProducts'=>SpecialProduct::latest()->take(3)->get()
        ]);
    }
}
