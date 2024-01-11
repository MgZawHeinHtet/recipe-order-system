<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    
    public function restoreAll(){
        
    }

    public function restore(string $id){
        $product = Product::withTrashed()->find($id);
        $product->restore();
        return back();
    }
}
