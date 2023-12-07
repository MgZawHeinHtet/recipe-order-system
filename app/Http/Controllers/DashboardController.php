<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItems;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {
        $date = Carbon::today()->subDays(7);
        $last_seven_days_orders = Order::where('created_at', ">=", $date)->get();
        $labels = collect([]);
        foreach ($last_seven_days_orders as $order) {
            $labels->push($order->created_at->format('M d'));
        };

        $income_per_days =  DB::table('orders')
            ->where('orders.created_at', '>=', $date)
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->groupBy(DB::raw('DATE(orders.created_at)'))
            ->select(
                DB::raw('SUM(order_items.order_price) as total')
            )->get();

        $stocks =  DB::table('products')
            ->where('products.created_at', '>=', $date)

            ->groupBy(DB::raw('DATE(products.created_at)'))
            ->select(
                DB::raw('SUM(products.price*products.stock) as total')
            )->get();

        $total_income = OrderItems::sum('total');
        $total_order = Order::count();
        $total_customer = Customer::count();


        return view('Dashboard.index', [
            'last_seven_days_orders' => $last_seven_days_orders,
            'labels' => $labels->unique(),
            'incomes' => $income_per_days,
            'stocks' => $stocks,
            'total_income'=> $total_income,
            'total_order'=>$total_order,
            'total_customer'=>$total_customer
        ]);
    }
}
