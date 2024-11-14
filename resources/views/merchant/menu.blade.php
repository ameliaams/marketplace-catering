@extends('layouts')

@section('title', 'Menu')

@section('content')
<div class="card">
  <div class="card-body">
    <a href="{{ route('merchant.addmenu') }}" class="btn btn-primary">Add Menu</a>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            @foreach ($foods as $menu)
            <div class="card">
                <img src="{{ asset('storage/' . $menu->photo) }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $menu->name }}</h5>
                    <p class="card-text">{{ $menu->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
      </div>
  </div>
</div>

@endsection
