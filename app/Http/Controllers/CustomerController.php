<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class CustomerController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }

    public function menuKatering()
    {
        $foods = Menu::all();
        return view('user.catering', compact('foods'));
    }
}
