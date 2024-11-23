<?php

namespace App\Repositories;

use App\Models\Menu;
use App\Interfaces\MenuInterface;
use Illuminate\Support\Facades\Storage;

class MenuRepository implements MenuInterface
{
    public function getByMerchantId($merchantId)
    {
        return Menu::where('merchant_id', $merchantId)->get();
    }

    public function create(array $data)
    {
        return Menu::create($data);
    }

    public function update($id, array $data)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            throw new \Exception('Menu not found');
        }

        if (isset($data['photo']) && $menu->photo) {
            Storage::delete('public/' . $menu->photo);
        }

        $menu->update($data);

        return $menu;
    }

    public function delete(Menu $food)
    {
        if ($food->photo) {
            Storage::delete('public/' . $food->photo);
        }

        $food->delete();
    }
}
