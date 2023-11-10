<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\Restaurant;
use App\Models\Order;
use App\Models\Spending;
use App\Models\Income;
use App\Models\Product;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index()
    {
        $user = Auth::user()->restaurant_id;
        $tables = Table::where('restaurant_id', $user)->get();
        return view('front.home', ['tables'=>$tables]);
    }

    public function attendTable($id)
    {
        $table = Table::find($id);
        $orders = Order::where('table_id', $id)->get();
        return view('front.attend', ['table'=>$table, 'orders'=>$orders]);
    }

    public function kitchen()
    {
        $user = Auth::user()->restaurant_id;
        $restaurants = Restaurant::all();
        $paymentMethods = PaymentMethod::all();
        $orders = Order::where('restaurant_id', $user)->get();
        return view('front.kitchen', ['orders'=>$orders, 'restaurants'=>$restaurants, 'paymentMethods'=>$paymentMethods]);
    }

    public function incomes()
    {
        $user = Auth::user()->restaurant_id;
        $incomes = Income::where('restaurant_id', $user)->get();
        $restaurants = Restaurant::all();
        return view('front.incomes', ['incomes'=>$incomes, 'restaurants'=>$restaurants]);
    }
    
    public function spendings()
    {
        $user = Auth::user()->restaurant_id;
        $spendings = Spending::where('restaurant_id', $user)->get();
        $restaurants = Restaurant::all();
        return view('front.spendings', ['spendings'=>$spendings, 'restaurants'=>$restaurants]);
    }

    public function stock()
    {
        $products = DB::table('products')->orderBy('stock', 'asc')->get();
        return view('front.stock', ['products'=>$products]);
    }
}
