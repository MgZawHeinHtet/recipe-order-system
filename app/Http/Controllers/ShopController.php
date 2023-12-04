<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        $requests = request(['country','category','type']);
        return view('shop.index',[
            'categories'=>Category::all(),
            'latestProducts'=> Product::latest()->take(4)->get(),
            'priceProducts'=>Product::orderBy('price','desc')->take(4)->get(),
            'cart' => Cart::where('user_id',auth()->user()?->id)->first(),
            'countries'=>Country::all(),
            'products' => Product::latest()->filter($requests)->paginate(8)->withQueryString()
        ]);
    }
}
