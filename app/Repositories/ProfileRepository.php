<?php

namespace App\Repositories;

use App\Interfaces\ProfileInterface;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;

class ProfileRepository implements ProfileInterface
{
    public function __construct(
        protected Profile $profile
    ) {}

    public function getData()
    {
        return Profile::all();
    }

    public function getDataById($id)
    {
        return $this->profile->where('merchant_id', $id)->firstOrFail();
    }

    public function updateProfile($id, array $newData)
    {
        $profile = Profile::find($id);

        if (!$profile) {
            throw new \Exception('Profile not found');
        }

        // if (isset($data['photo']) && $profile->photo) {
        //     Storage::delete('public/' . $profile->photo);
        // }

        $profile->update($newData);
        return $profile;
    }
}
