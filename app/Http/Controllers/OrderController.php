<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\subscriber;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = request(['status','input_track', 'last-day', '7-days', 'last-month', 'last-year']);
        return view('Dashboard.order',[
            'orders' => Order::with('customer','payment')->filter($requests)->latest()->paginate(10),
            'statuses' => OrderStatus::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        
        return view('Dashboard.order-detail',[
            'order'=> $order,
            'orderStatuses' => OrderStatus::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Order $order)
    {   
        Notification::create([
            'user_id'=> $order->customer->user_id,
            'noti_type' => 'change-order-status',
            'is_read'=> false,
            'recipent_id'=> 1
        ]);
        $order->order_status_id= request('status');
        $order->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
