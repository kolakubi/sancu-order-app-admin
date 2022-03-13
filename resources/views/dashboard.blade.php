@extends('main')

@section('content')
    
<div class="section-header">
    <h1>Dashboard</h1>
</div>

{{-- item terjual --}}
<div class="row p-3 bg-white">
    <div class="col-12"><h6 class="text-black">Item terjual hari ini</h6></div>

    {{-- sancu --}}
    <div class="col-3">
        <div class="card bg-primary">
            <div class="card-header">
              Sancu
            </div>
            <div class="card-body">
              <h3 class="card-title">1.400</h3>
              <p class="card-text">pasang</p>
            </div>
          </div>
    </div>

    {{-- boncu --}}
    <div class="col-3">
        <div class="card bg-success">
            <div class="card-header">
              Boncu
            </div>
            <div class="card-body">
              <h3 class="card-title">300</h3>
              <p class="card-text">pasang</p>
            </div>
          </div>
    </div>

    {{-- pretty --}}
    <div class="col-3">
        <div class="card bg-danger">
            <div class="card-header">
              Pretty
            </div>
            <div class="card-body">
              <h3 class="card-title">700</h3>
              <p class="card-text">pasang</p>
            </div>
          </div>
    </div>

    {{-- xtreme --}}
    <div class="col-3">
        <div class="card bg-dark">
            <div class="card-header">
              Xtreme
            </div>
            <div class="card-body">
              <h3 class="card-title">600</h3>
              <p class="card-text">pasang</p>
            </div>
          </div>
    </div>
</div>

{{-- pendapatan --}}
<div class="row mt-3 p-3 bg-white">
    <div class="col-4">
        <h6>Total penjualan hari ini</h6>
        <div class="card bg-info">
            <div class="card-header">
                Penjualan
            </div>
            <div class="card-body">
                <h3 class="card-title">Rp 40.000.000</h3>
                <p class="card-text">Rupiah</p>
            </div>
        </div>
    </div>

    <div class="col-4">
        <h6>Total Order hari ini</h6>
        <div class="card bg-light">
            <div class="card-header">
                Order
            </div>
            <div class="card-body">
                <h3 class="card-title">12</h3>
                <p class="card-text">Distributor</p>
            </div>
        </div>
    </div>
</div>

@endsection