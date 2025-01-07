<?php

namespace App\Http\Controllers\Merchant;

use App\Models\User;
use App\Models\Profile;
use App\Http\Controllers\Controller;
use App\Services\ProfileService;
use App\Http\Requests\ProfileRequest;


class ProfileController extends Controller
{
    public function __construct(protected ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function showById($id)
    {
        $data = auth()->user();
        $profile = $this->profileService->getDataProfile($id);
        return view('merchant.profile', compact('profile', 'data'));
    }

    public function edit(Profile $profile)
    {
        $data = auth()->user();
        $profile = $this->profileService->getDataProfile($data->id);
        return view('merchant.updateProfile', compact('profile', 'data'));
    }

    public function update(ProfileRequest $request, $profileId)
    {
        try {
            $userId = auth()->user()->id;  // Mendapatkan ID user yang sedang login
            $this->profileService->updateProfile($request, $profileId, $userId);
            return redirect()->route('merchant.profile', ['id' => $profileId])->with('success', 'Profile updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
