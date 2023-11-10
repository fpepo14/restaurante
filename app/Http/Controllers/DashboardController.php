<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Spending;
use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', '!=', 'ANULADA');
        $countOrders = $orders->count();
        $chargedOrders = $orders->where('charged', true);
        $total = $orders->sum('total');
        $products = Product::where('stock', '<=', 0);
        $countProducts = $products->count();
        $canceledOrders = Order::where('status', 'ANULADA')->count();
        $spendings = Spending::all();
        $totalSpendings = $spendings->sum('amount');
        $generalBalance = $total - $totalSpendings;
        $users = User::all();
        $totalUsers = $users->count();
        $restaurants = Restaurant::all();
        $totalRestaurants = $restaurants->count();
        return view('dashboard', ['countOrders'=>$countOrders, 'total'=>$total, 'countProducts'=>$countProducts, 'canceledOrders'=>$canceledOrders, 'generalBalance'=>$generalBalance, 'totalSpendings'=>$totalSpendings, 'totalUsers'=>$totalUsers, 'totalRestaurants'=>$totalRestaurants]);
    }
}
