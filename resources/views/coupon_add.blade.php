@extends('main')

@section('content')
    
<div class="section-header">
    <h1>Coupon</h1>
</div>

<div class="row d-flex align-items-center justify-content-center">
    <div class="col-6 p-4 bg-white">
        <h4 class="text-center mb-4">Tambah Coupon</h4>

        <form action="" method="post">
            @csrf

            @if(session('kode_coupon_error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('kode_coupon_error') }}
                </div>
            @endif
            <div class="form-group row">
                <label for="kode_coupon" class="col-sm-3 col-form-label">Kode Coupon</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="kode_coupon" name="kode_coupon" placeholder="kode coupon..." required style="text-transform:uppercase">
                </div>
            </div>

            <div class="form-group row">
                <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan..." required>
                </div>
            </div>

            @if(session('add_berhasil'))
                <div class="alert alert-danger" role="alert">
                    {{ session('add_berhasil') }}
                </div>
            @endif
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Periode</label>
                <div class="form-row col-9">
                    <div class="form-group col-md-6">
                        <label for="tanggal_mulai">Dari</label>
                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_dari" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tanggal_sampai">Sampai</label>
                        <input type="date" class="form-control" id="tanggal_sampai" name="tanggal_sampai" required>
                    </div>
                </div>
            </div>

            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-3 pt-0">Tipe Coupon</legend>
                    <div class="col-sm-9">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tipe_coupon" id="tipe_coupon1" value="nominal" checked required>
                            <label class="form-check-label" for="tipe_coupon1">
                                Nominal
                            </label>
                        </div>
                        {{-- <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="tipe_coupon" id="tipe_coupon3" value="persen" disabled>
                            <label class="form-check-label" for="tipe_coupon3">
                                Persen
                            </label>
                        </div> --}}
                    </div>
                </div>
            </fieldset>

            <div class="form-group row">
                <label for="potongan" class="col-sm-3 col-form-label">Potongan per item</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="potongan" name="potongan" placeholder="potongan per item..." required>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-danger" href="{{ url()->previous() }}">Kembali</a>
                </div>
            </div>
            
        </form>
    </div>
</div>

@endsection