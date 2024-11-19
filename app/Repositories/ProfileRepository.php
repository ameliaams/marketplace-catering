<?php

namespace App\Repositories;

use App\Interfaces\ProfileInterface;
use App\Models\Profile;

class ProfileRepository implements ProfileInteface
{
    public function __construct(
        protected Profile $profile
    ) {}

    public function getAll()
    {
        return $this->model->all();
    }
}
