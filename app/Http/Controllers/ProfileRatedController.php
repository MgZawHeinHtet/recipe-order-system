<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileRatedController extends Controller
{
    public function index(){
        return view('profile.rated-product',[
            'products' => auth()->user()->ratedProducts()->latest()->paginate(8)
        ]);
    }
}
