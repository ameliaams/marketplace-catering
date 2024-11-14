@extends('layouts')

@section('title', 'Order List')

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <tr>
                <th></th>
                <th>Nama</th>
                <th>Pesanan</th>
                <th>Tgl Pengiriman</th>
                <th>Detail</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Amel</td>
                <td>Nasi Ayam Kotak</td>
                <td>14 November</td>
                <td><button class="btn btn-success">Detail</button></td>
            </tr>
          </table>
    </div>
</div>
@endsection
