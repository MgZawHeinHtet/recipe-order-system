<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Order $order){
        
        return view('profile.invoice',[
            'order'=>$order->load(['customer','payment']),
            'products'=>$order->order_items
        ]);
    }
}
