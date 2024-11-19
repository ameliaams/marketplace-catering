@extends('layouts')

@section('title', 'Profile')

@section('content')
<div class="card">
    <div class="card-body">
        <form class="row g-3" action="{{ route('merchant.profile', ['data' => $data, 'profile' => $profile]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h3>Profile</h3>

            <!-- Email -->
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email', $data->email) }}">
            </div>

            <!-- Username -->
            <div class="col-md-6">
                <label for="name" class="form-label">Username</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $data->name) }}">
            </div>

            <!-- Company Name -->
            <div class="col-md-6">
                <label for="company_name" class="form-label">Company Name</label>
                <input type="text" class="form-control" name="company_name" value="{{ old('company_name', $profile->company_name ?? '') }}">
            </div>

            <!-- Contact -->
            <div class="col-md-6">
                <label for="contact" class="form-label">Contact</label>
                <input type="text" class="form-control" name="contact" value="{{ old('contact', $profile->contact ?? '') }}">
            </div>

            <!-- Description -->
            <div class="col-12">
                <label for="company_desc" class="form-label">Description about company</label>
                <textarea name="company_desc" class="form-control" rows="5">{{ old('company_desc', $profile->company_desc ?? '') }}</textarea>
            </div>

            <!-- Address -->
            <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" value="{{ old('address', $profile->address ?? '') }}">
            </div>

            <!-- Submit Button -->
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>

    </div>
</div>
@endsection
