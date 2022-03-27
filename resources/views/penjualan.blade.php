@extends('main')

@section('content')

    <div class="section-header">
        <h1>{{$title}}</h1>
    </div>

    <div class="row p-3">
        <div class="col-4 text-center bg-white p-3">
            <form method="post">
                @csrf
                <div class="mb-3">
                  <label for="tanggaldari" class="form-label">Tanggal dari</label>
                  <input type="date" class="form-control" id="tanggaldari" aria-describedby="tanggaldari" name="tanggaldari" required>
                </div>
                <div class="mb-3">
                    <label for="tanggalsampai" class="form-label">sampai</label>
                    <input type="date" class="form-control" id="tanggalsampai" aria-describedby="tanggalsampai" name="tanggalsampai" required>
                  </div>
                <button type="submit" class="btn btn-primary">Cek Pembelian</button>
            </form>
        </div>
    </div>

    {{-- item terjual --}}
    <div class="row p-3 bg-white">
        <div class="col-12"><h6 class="text-black">Item terjual</h6></div>

        {{-- sancu --}}
        <div class="col-2">
            <div class="card bg-primary">
                <div class="card-header">
                Sancu
                </div>
                <div class="card-body">
                <h3 class="card-title">{{$item_sancu}}</h3>
                <p class="card-text">pasang</p>
                </div>
            </div>
        </div>

        {{-- boncu --}}
        <div class="col-2">
            <div class="card bg-success">
                <div class="card-header">
                Boncu
                </div>
                <div class="card-body">
                <h3 class="card-title">{{$item_boncu}}</h3>
                <p class="card-text">pasang</p>
                </div>
            </div>
        </div>

        {{-- pretty --}}
        <div class="col-2">
            <div class="card bg-danger">
                <div class="card-header">
                Pretty
                </div>
                <div class="card-body">
                <h3 class="card-title">{{$item_pretty}}</h3>
                <p class="card-text">pasang</p>
                </div>
            </div>
        </div>

        {{-- xtreme --}}
        <div class="col-2">
            <div class="card bg-dark">
                <div class="card-header">
                Xtreme
                </div>
                <div class="card-body">
                <h3 class="card-title">{{$item_xtreme}}</h3>
                <p class="card-text">pasang</p>
                </div>
            </div>
        </div>

        {{-- lainnya --}}
        <div class="col-2">
            <div class="card bg-secondary">
                <div class="card-header">
                Lainnya
                </div>
                <div class="card-body">
                <h3 class="card-title">{{$item_lainnya}}</h3>
                <p class="card-text">pasang</p>
                </div>
            </div>
        </div>

    </div>

    {{-- pendapatan --}}
    <div class="row mt-3 p-3 bg-white">
        <div class="col-4">
            <h6>Total penjualan</h6>
            <div class="card bg-info">
                <div class="card-header">
                    Penjualan
                </div>
                <div class="card-body">
                    <h3 class="card-title">Rp{{number_format($uang_penjualan, 0)}}</h3>
                    <p class="card-text">Rupiah</p>
                </div>
            </div>
        </div>

        <div class="col-4">
            <h6>Total Order</h6>
            <div class="card bg-light">
                <div class="card-header">
                    Order
                </div>
                <div class="card-body">
                    <h3 class="card-title">{{$total_order}}</h3>
                    <p class="card-text">Order</p>
                </div>
            </div>
        </div>
    </div>

@endsection