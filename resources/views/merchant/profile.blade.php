@extends('layouts')

@section('title', 'Profile')

@section('content')
<div class="card">
    <div class="card-body">
        <div>
            <h3>Profile</h3>
            <a href="{{ route('merchant.editProfile', ['id' => $data->id]) }}" class="btn btn-primary">Update Profile</a>
        </div>
        <div class="row mb-3 mt-5">
            <div class="col-md-6">
                <label for="email" class="h6 form-label">Email</label>
                <p>{{ old('email', $data->email) }}</p>
            </div>
            <div class="col-md-6">
                <label for="name" class="h6 form-label">Username</label>
                <p>{{ old('email', $data->email) }}</p>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="company_name" class="h6 form-label">Company Name</label>
                <p>{{ old('company_name', $profile->company_name ?? '') }}</p>
            </div>
            <div class="col-md-6">
                <label for="contact" class="h6 form-label">Contact</label>
                <p>{{ old('contact', $profile->contact ?? '') }}</p>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="company_desc" class="h6 form-label">Description about company</label>
                <textarea name="company_desc" class="form-control" rows="5" readonly>{{ old('company_desc', $profile->description ?? '') }}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="address" class="h6 form-label">Address</label>
                <input type="text" class="form-control" name="address" value="{{ old('address', $profile->address ?? '') }}" readonly>
            </div>
        </div>
    </div>
</div>
@endsection
