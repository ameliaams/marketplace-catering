@extends('layouts')

@section('title', 'Catering Menu')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="container py-5">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($foods as $menu)
                <div class="col">
                    <div class="card shadow-sm border-light rounded">
                        <img src="{{ asset('storage/' . $menu->photo) }}" class="card-img-top" alt="{{ $menu->name }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title text-truncate" style="max-width: 200px;">{{ $menu->name }}</h5>
                            <p class="card-text text-muted" style="font-size: 14px; height: 50px; overflow: hidden;">{{ $menu->description }}</p>
                            <p class="card-text fw-bold">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('merchant.edit', $menu->id) }}" class="btn btn-primary btn-sm ">Order</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="..." class="img-fluid rounded-start">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>

@endsection
