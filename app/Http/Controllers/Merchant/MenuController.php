<?php

namespace App\Http\Controllers\Merchant;

use App\Models\Menu;
use App\Http\Controllers\Controller;
use App\Services\MenuService;
use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;

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

    public function store(MenuRequest $request)
    {
        try {
            $this->menuService->createMenu($request->except('_token'));
            return redirect()->route('merchant.menu')->with('success', 'Food item created successfully.');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function edit(Menu $food)
    {
        return view('merchant.editmenu', compact('food'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->menuService->updateMenu($request, $id);

            return redirect()->route('merchant.menu')->with('success', 'Food item updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Menu $food)
    {
        $this->menuService->deleteMenu($food);
        return redirect()->route('merchant.menu')->with('success', 'Food item deleted successfully.');
    }
}
