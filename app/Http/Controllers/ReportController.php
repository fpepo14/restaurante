<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Table;
use App\Models\Restaurant;
use App\Models\Spending;
use App\Models\Income;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        $tables = Table::all();
        return view('report.index', ['restaurants'=>$restaurants, 'tables'=>$tables]);
    }

    public function ordersForRestaurant(Request $request)
    {
        $from = $request->get('from');
        $to = $request->get('to');
        $restaurantId = $request->get('restaurant_id');
        $restaurant = Restaurant::find($restaurantId);
        $orders = Order::whereBetween('created_at', [$from, $to])->where('restaurant_id', $restaurantId)->get();
        return view('report.ordersforrestaurant', ['orders'=>$orders, 'restaurant'=>$restaurant]);
    }

    public function reportForm()
    {
        return view('front.reportForm');
    }

    public function reportForDay(Request $request)
    {
        $from = $request->get('from');
        $to = $request->get('to');
        $restaurantId = $request->get('restaurant_id');
        $restaurant = Restaurant::find($restaurantId);
        $orders = Order::whereBetween('created_at', [$from, $to])->where('restaurant_id', $restaurantId)->get();
        $incomes = Income::whereBetween('created_at', [$from, $to])->where('restaurant_id', $restaurantId)->get();
        $totalIncomes = $incomes->sum('amount');
        $totalOrders = $orders->sum('total');
        $totalGain = $totalIncomes + $totalOrders;
        $spendings = Spending::whereBetween('created_at', [$from, $to])->where('restaurant_id', $restaurantId)->get();
        $totalSpendings = $spendings->sum('amount');
        $generalBalance = $totalGain - $totalSpendings;
        $payment_methods = PaymentMethod::all();
        $orders = Order::where('payment_method_id', 3);
        $orders_cash = $orders->sum('total');
        $cash = ($totalIncomes + $orders_cash) - $totalSpendings;
        $payment_method_collection = array();
        foreach ($payment_methods as $payment_method)
        {
            $orders_payments = Order::where('payment_method_id', $payment_method->id);
            $total = $orders_payments->sum('total');
            array_push($payment_method_collection, ['name'=>$payment_method->name, 'total'=>$total]);
        }
        return view('front.reportForDay', ['totalGain'=>$totalGain, 'totalSpendings'=>$totalSpendings, 'generalBalance'=>$generalBalance, 'restaurant'=>$restaurant, 'paymentMethodCollection'=>$payment_method_collection, 'cash'=>$cash]);
    }
}
