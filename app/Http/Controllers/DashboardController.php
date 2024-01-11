<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {
        $date = date('M d');

        $date_arr = collect([]);

        $full_date_arrs = collect([]);

        $income_amount = [];

       

        for ($i = 0; $i < 7; $i++) {
            $date_arr->push(date('M d', strtotime("-{$i} days")));

            $full_date_arrs->push([
                'year' => date("Y", strtotime("-$i days")),
                'month' => date("m", strtotime("-$i days")),
                'day' => date("d", strtotime("-$i days")),
            ]);
        }

       

        foreach ($full_date_arrs->sortBy('day') as $full_date_arr) {

            $income_amount[] = OrderItems::whereYear('created_at', $full_date_arr['year'])
                ->whereMonth('created_at', $full_date_arr['month'])
                ->whereDay('created_at', $full_date_arr['day'])
                ->sum('total');
        }

        $today_orders = Order::whereDate('created_at', now())->get();

        $pending = 0;
        $processing = 0;
        $shipped = 0;
        $delivery = 0;
        $complete = 0;

        foreach ($today_orders as $order) {

            switch ($order->order_status_id) {
                case 1:
                    $pending++;
                    break;
                case 2:
                    $processing++;
                    break;
                case 3:
                    $shipped++;
                    break;
                case 4:
                    $delivery++;
                    break;
                case 5:
                    $complete++;
                    break;

                default:;
            }
        }
        
        $today_orders = [$pending,$processing,$shipped,$delivery,$complete];

        $stocks =  DB::table('products')
            ->where('products.updated_at', '>=', $date)

            ->groupBy(DB::raw('DATE(products.updated_at)'))
            ->select(
                DB::raw('SUM(products.price) as total')
            )->get();

        $total_income = OrderItems::sum('total');
        $total_order = Order::count();
        $total_customer = Customer::count();


        return view('Dashboard.index', [
            'labels' => $date_arr,
            'incomes' => $income_amount,
            'stocks' => $stocks,
            'total_income' => $total_income,
            'total_order' => $total_order,
            'total_customer' => $total_customer,
            'today_orders' => $today_orders,
            'customers' => Customer::with('user')->orderBy('order_time','DESC')->take(5)->get(),
            'stock_products'=>Product::with('category')->where('stock',"<=",5)->orderBy('stock')->paginate(6)
        ]);
    }
}
