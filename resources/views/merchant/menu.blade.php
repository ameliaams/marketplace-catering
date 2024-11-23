@extends('layouts')

@section('title', 'Menu')

@section('content')
<div class="card">
    <div class="card-body">
        <a href="{{ route('merchant.addmenu') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i><span>  Add Menu</span></a>
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
                                <a href="{{ route('merchant.edit', $menu->id) }}" class="btn btn-primary btn-sm ">Edit</a>
                                <form action="{{ route('merchant.delete', $menu->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm ">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>

@endsection
