<?php

namespace App\Services;

use App\Interfaces\MenuInterface;
use Illuminate\Support\Facades\DB;

class MenuService
{
    protected $menuRepository;

    public function __construct(MenuInterface $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    public function getMenusByMerchant($merchantId)
    {
        return $this->menuRepository->getByMerchantId($merchantId);
    }

    public function createMenu($data)
    {
        try {
            DB::transaction(function () use($data) {
                $menuData = [
                'merchant_id' => $data['merchant_id'],
                'name' => $data['name'],
                'description' => $data['description'],
                'price' => $data['price'],
                'photo' => $data['photo']->store('photos', 'public')
            ];
            $this->menuRepository->create($menuData);
        });
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage());
        }
    }

    public function updateMenu($food, $data)
    {
        return $this->menuRepository->update($food, $data);
    }

    public function deleteMenu($food)
    {
        return $this->menuRepository->delete($food);
    }
}
