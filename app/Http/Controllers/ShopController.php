<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        return view('shop.index',[
            'categories'=>Category::all(),
            'latestProducts'=> Product::latest()->take(4)->get()
        ]);
    }
}
