<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Table;
use App\Models\User;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('restaurant.index', ['restaurants'=>$restaurants]);
    }

    public function store(StoreRestaurantRequest $request)
    {
        $restaurant = new Restaurant();
        $restaurant->name = $request->get('name');
        $restaurant->save();
        return redirect('/restaurantes');
    }

    public function show($id)
    {
        $restaurant = Restaurant::find($id);
        return view('restaurant.show', ['restaurant'=>$restaurant]);
    }

    public function update(UpdateRestaurantRequest $request, $id)
    {
        $restaurant = Restaurant::find($id);
        $restaurant->name = $request->name;
        $restaurant->save();
        return redirect('/restaurantes');
    }

    public function destroy($id)
    {
        $restaurant = Restaurant::find($id);
        $tables = Table::where('restaurant_id', $id);
        $users = User::where('restaurant_id', $id);
        $tables->delete();
        $users->delete();
        $restaurant->delete();
        return redirect('/restaurantes');
    }
}
