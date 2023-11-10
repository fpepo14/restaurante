<?php

namespace App\Http\Controllers;

use App\Models\Spending;
use App\Models\Restaurant;
use App\Http\Requests\StoreSpendingRequest;
use App\Http\Requests\UpdateSpendingRequest;
use Illuminate\Support\Facades\Auth;

class SpendingController extends Controller
{
    public function index()
    {
        $spendings = Spending::all();
        $restaurants = Restaurant::all();
        return view('spending.index', ['spendings'=>$spendings, 'restaurants'=>$restaurants]);
    }

    public function store(StoreSpendingRequest $request)
    {
        $spending = new Spending();
        $spending->name = $request->get('name');
        $spending->amount = $request->get('amount');
        $spending->restaurant_id = $request->get('restaurant_id');
        $spending->save();
        if(Auth::user()->type == 'ADMIN')
        {
            return redirect('/gastos');
        }
        else
        {
            return redirect('/cocina/gastos');
        }
        
    }

    public function update(UpdateSpendingRequest $request, $id)
    {
        $spending = Spending::find($id);
        $spending->name = $request->name;
        $spending->amount = $request->amount;
        $spending->restaurant_id = $request->restaurant_id;
        $spending->save();
        return redirect('/gastos');
    }

    public function destroy($id)
    {
        $spending = Spending::find($id);
        $spending->delete();
        return redirect('/gastos');
    }
}
