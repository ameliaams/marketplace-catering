<?php

namespace App\Services;

use App\Interfaces\MenuInterface;
use Illuminate\Support\Facades\DB;

class MenuService
{
    public function __construct(private MenuInterface $menuInterface) {}

    public function getMenusByMerchant($merchantId)
    {
        return $this->menuInterface->getByMerchantId($merchantId);
    }

    public function createMenu($request)
    {
        $merchantId = auth()->user()->id;
        try {
            DB::transaction(function () use ($request, $merchantId) {
                $menuData = [
                    'merchant_id' => $merchantId,
                    'name' => $request['name'],
                    'description' => $request['description'],
                    'price' => $request['price'],
                ];

                if (isset($request['photo']) && $request['photo']->isValid()) {
                    $menuData['photo'] = $request['photo']->store('photos', 'public');
                }

                $this->menuInterface->create($menuData);
            });
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage());
        }
    }

    public function updateMenu($request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $menuData = [
                    'name' => $request['name'],
                    'description' => $request['description'],
                    'price' => $request['price'],
                ];

                if ($request->hasFile('photo')) {
                    $menuData['photo'] = $request->file('photo')->store('photos', 'public');
                }

                return $this->menuInterface->update($id, $menuData);
            });
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage());
        }
    }

    public function deleteMenu($food)
    {
        return $this->menuInterface->delete($food);
    }
}
