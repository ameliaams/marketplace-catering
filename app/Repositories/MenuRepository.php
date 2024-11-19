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

    public function update(Menu $food, array $data)
    {
        $food->name = $data['name'];
        $food->description = $data['description'];
        $food->price = $data['price'];

        if (isset($data['photo'])) {
            if ($food->photo) {
                Storage::delete('public/' . $food->photo);
            }
            $food->photo = $data['photo']->store('photos', 'public');
        }

        $food->save();
        return $food;
    }

    public function delete(Menu $food)
    {
        if ($food->photo) {
            Storage::delete('public/' . $food->photo);
        }

        $food->delete();
    }
}
