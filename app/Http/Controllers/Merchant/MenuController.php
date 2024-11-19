<?php

namespace App\Http\Controllers\Merchant;

use App\Models\Menu;
use App\Http\Controllers\Controller;
use App\Services\MenuService;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function menuKatering()
    {
        $merchantId = auth()->user()->id;
        $foods = $this->menuService->getMenusByMerchant($merchantId);
        return view('merchant.menu', compact('foods'));
    }

    public function create()
    {
        return view('merchant.addmenu');
    }

    public function store(Request $request)
    {
        $request->validate([
            'merchant_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $this->menuService->createMenu($request->all());
            return redirect()->route('merchant.menu')->with('success', 'Food item created successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
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

        $this->menuService->updateMenu($food, [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'photo' => $request->hasFile('photo') ? $request->file('photo') : null,
        ]);

        return redirect()->route('merchant.menu')->with('success', 'Food item updated successfully.');
    }

    public function destroy(Menu $food)
    {
        $this->menuService->deleteMenu($food);
        return redirect()->route('merchant.menu')->with('success', 'Food item deleted successfully.');
    }
}
