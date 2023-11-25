<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class PdfDownloadController extends Controller
{
    public function download(Order $order) {
        
        $pdf = Pdf::loadView('customer_invoice',[
            'order'=>$order->load(['customer','payment']),
            'products'=>$order->order_items
        ]);
        
    
        return $pdf->download($order->order_number  .'.pdf');
    }
}
