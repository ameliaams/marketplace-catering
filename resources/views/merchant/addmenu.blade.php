@extends('layouts')

@section('title', 'Add Menu')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('merchant.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name of Menu</label>
              <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter the description"></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Example: 10000">
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Food Photo</label>
                <input type="file" class="form-control" name="photo">
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success me-3">Add Menu</button>
            <a href="{{ route('merchant.menu') }}" class="btn btn-primary">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection
