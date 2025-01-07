<?php

namespace App\Interfaces;

interface ProfileInterface
{
    public function getData();
    public function getDataById($id);
    public function updateProfile($id, array $newData);
}
