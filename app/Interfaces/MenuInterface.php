<?php

namespace App\Interfaces;

use App\Models\Menu;

interface MenuInterface
{
    public function getByMerchantId($merchantId);

    public function create(array $data);

    public function update(Menu $food, array $data);

    public function delete(Menu $food);
}
