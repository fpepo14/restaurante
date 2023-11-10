<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $restaurants = Restaurant::all();
        return view('user.index', ['users'=>$users, 'restaurants'=>$restaurants]);
    }
}
