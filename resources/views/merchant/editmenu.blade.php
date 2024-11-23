@extends('layouts')

@section('title', 'Edit Menu')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('merchant.update', $food) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name of Menu</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $food->name) }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter the description">{{ old('description', $food->description) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Example: 10000" value="{{ old('price', $food->price) }}">
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Food Photo</label>
                <input type="file" class="form-control" name="photo">
                @if($food->photo)
                    <img src="{{ asset('storage/'.$food->photo) }}" alt="Food Photo" width="100">
                @endif
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success me-3">Update Menu</button>
            <a href="{{ route('merchant.menu') }}" class="btn btn-primary">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection
