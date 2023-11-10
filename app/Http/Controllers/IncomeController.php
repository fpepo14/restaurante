<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Restaurant;
use App\Http\Requests\StoreIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    public function index()
    {
        $incomes = Income::all();
        $restaurants = Restaurant::all();
        return view('income.index', ['incomes'=>$incomes, 'restaurants'=>$restaurants]);
    }

    public function store(StoreIncomeRequest $request)
    {
        $income = new Income();
        $income->name = $request->get('name');
        $income->amount = $request->get('amount');
        $income->restaurant_id = $request->get('restaurant_id');
        $income->save();
        if(Auth::user()->type == 'ADMIN')
        {
            return redirect('/ingresos');
        }
        else
        {
            return redirect('/cocina/ingresos');
        }
    }

    public function update(UpdateIncomeRequest $request, $id)
    {
        $income = Income::find($id);
        $income->name = $request->name;
        $income->amount = $request->amount;
        $income->restaurant_id = $request->restaurant_id;
        $income->save();
        return redirect('/ingresos');
    }

    public function destroy($id)
    {
        $income = Income::find($id);
        $income->delete();
        return redirect('/ingresos');
    }
}
