<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class MerchantController extends Controller
{
    public function index()
    {
        return view('merchant.dashboard');
    }

    public function showProfile(Profile $profile, User $data)
    {
        $data = auth()->user();
        $profile = $data->merchant;
        return view('merchant.profile', compact('profile', 'data'));
    }

    public function menuKatering()
    {
        $merchantId = auth()->user()->id;
        $foods = Menu::where('merchant_id', $merchantId)->get();
        return view('merchant.menu', compact('foods'));
    }


    public function create()
    {
        return view('merchant.addmenu');
    }

    public function store(Request $request)
    {
        $merchantId = auth()->user()->id;

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $food = new Menu;
        $food->merchant_id = $merchantId;
        $food->name = $request->name;
        $food->description = $request->description;
        $food->price = $request->price;

        if ($request->hasFile('photo')) {
            $food->photo = $request->file('photo')->store('photos', 'public');
        }

        $food->save();
        return redirect()->route('merchant.menu')->with('success', 'Food item created successfully.');
    }

    public function edit(Menu $food)
    {
        return view('merchant.editmenu', compact('food'));
    }

    public function update(Request $request, Menu $food)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $food->name = $request->name;
        $food->description = $request->description;
        $food->price = $request->price;

        if ($request->hasFile('photo')) {
            if ($food->photo) {
                Storage::delete('public/' . $food->photo);
            }
            $food->photo = $request->file('photo')->store('photos', 'public');
        }

        $food->save();

        return redirect()->route('merchant.menu')->with('success', 'Food item updated successfully.');
    }


    public function destroy(Menu $food)
    {
        if ($food->photo) {
            Storage::delete('public/' . $food->photo);
        }

        $food->delete();
        return redirect()->route('merchant.menu')->with('success', 'Food item deleted successfully.');
    }

    public function orderList()
    {
        return view('merchant.order');
    }
}
