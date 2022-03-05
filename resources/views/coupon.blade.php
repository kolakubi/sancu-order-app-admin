@extends('main')

@section('content')
    
<div class="section-header">
    <h1>Coupon</h1>
</div>

@if(session('add_berhasil'))
    <div class="alert alert-success" role="alert">
        {{ session('add_berhasil') }}
    </div>
@endif

<div class="row mb-4">
    <div class="col-12">
        <a class="btn btn-info" href="{{route('add_coupon')}}">Tambah Coupon +</a>
    </div>
</div>

<table class="table table-bordered" id="my_datatable">
    <thead>
        <tr>
            <th>Id Coupon</th>
            <th>Code</th>
            <th>Keterangan</th>
            <th>Tipe</th>
            <th>Potongan</th>
            <th>Berakhir</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

        @foreach($coupons as $coupon)
        <tr>
            <td>{{$coupon->id}}</td>
            <td>{{$coupon->name}}</td>
            <td>{{$coupon->keterangan}}</td>
            <td>{{$coupon->tipe}}</td>
            <td>{{$coupon->potongan}}</td>
            <td>{{$coupon->masa_aktif}}</td>
            <td>
                <a href="" class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                  </svg>
                </a>
            </td>
        </tr>
        @endforeach
        
    </tbody>
</table>

@endsection