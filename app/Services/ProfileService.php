<?php

namespace App\Services;

use App\Interfaces\ProfileInterface;
use Illuminate\Support\Facades\DB;

class ProfileService
{
    public function __construct(private ProfileInterface $profileInterface) {}


    public function getDataProfile($id)
    {
        return $this->profileInterface->getDataById($id);
    }

    public function updateProfile($request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id){
                $profileData = [
                    'company_name' => $request['company_name'],
                    'contact' => $request['contact'],
                    'description' => $request['description'],
                    'address' => $request['address'],
                ];

                // if ($request->hasFile('photo')) {
                //     $menuData['photo'] = $request->file('photo')->store('photos', 'public');
                // }

                return $this->profileInterface->updateProfile($id, $profileData);
            });
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage());
        }
    }
}
