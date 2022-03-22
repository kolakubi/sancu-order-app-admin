@extends('main')

@section('content')
    
<div class="section-header">
    <h1>{{$title}}</h1>
</div>

@if(session('update_berhasil'))
    <div class="alert alert-success" role="alert">
        {{ session('update_berhasil') }}
    </div>
@endif

<div class="row d-flex align-items-center justify-content-center">
    <div class="col-8 p-4 bg-white">
        <h4 class="text-center mb-4">Data Template Whatsapp</h4>

        <form action="" method="post">
            @csrf

            {{-- @if(session('error_nama'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error_nama') }}
                </div>
            @endif --}}
            @foreach($whatsapps as $whatsapp)
                @error('{{$whatsapp->id}}')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                @enderror
                <div class="form-group row">
                    <label for="{{$whatsapp->id}}" class="col-sm-3 col-form-label">{{$whatsapp->nama}}</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="{{$whatsapp->id}}" name="{{$whatsapp->id}}" placeholder="Template menunggu ongkir" rows="3" required value="{{$whatsapp->text}}">{{$whatsapp->text}}</textarea> 
                    </div>
                </div>
            @endforeach

            {{-- <div class="form-group row">
                <label for="menunggu_ongkir" class="col-sm-3 col-form-label">Menunggu Ongkir</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="menunggu_ongkir" name="menunggu_ongkir" placeholder="Template menunggu ongkir" rows="3" required></textarea> 
                </div>
            </div>

            <div class="form-group row">
                <label for="proses" class="col-sm-3 col-form-label">Di Proses</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="proses" name="proses" placeholder="Template proses" rows="3" required></textarea> 
                </div>
            </div>

            <div class="form-group row">
                <label for="konfirmasi_pembayaran" class="col-sm-3 col-form-label">Konfirmasi Pembayaran</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="konfirmasi_pembayaran" name="konfirmasi_pembayaran" placeholder="Template konfirmasi_pembayaran" rows="3" required></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="dikirm" class="col-sm-3 col-form-label">Dikirm</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="dikirm" name="dikirm" placeholder="Template dikirm" rows="3" required></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="selesai" class="col-sm-3 col-form-label">Order Selesai</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="selesai" name="selesai" placeholder="Template selesai" rows="3" required></textarea>
                </div>
            </div> --}}

            <div class="form-group row">
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Update</button>
                <a class="btn btn-danger" href="{{ url()->previous() }}">Kembali</a>
                </div>
            </div>
            
        </form>
    </div>
</div>

@endsection