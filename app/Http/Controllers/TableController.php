<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\Order;
use App\Models\Restaurant;
use App\Http\Requests\StoreTableRequest;
use App\Http\Requests\UpdateTableRequest;

class TableController extends Controller
{
    public function index()
    {
        $tables = Table::all();
        $restaurants = Restaurant::all();
        return view('table.index', ['tables'=>$tables, 'restaurants'=>$restaurants]);
    }

    public function store(StoreTableRequest $request)
    {
        $table = new Table();
        $table->name = $request->get('name');
        $table->restaurant_id = $request->get('restaurant_id');
        $table->save();
        return redirect('/mesas');
    }

    public function show($id)
    {
        $table = Table::find($id);
        return view('table.show', ['table'=>$table]);
    }

    public function update(UpdateTableRequest $request, $id)
    {
        $table = Table::find($id);
        $table->name = $request->name;
        $table->restaurant_id = $request->restaurant_id;
        $table->save();
        return redirect('/mesas');
    }

    public function destroy($id)
    {
        $table = Table::find($id);
        $orders = Order::where('table_id', $id);
        $orders->delete();
        $table->delete();
        return redirect('/mesas');
    }
}
