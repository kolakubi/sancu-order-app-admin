@extends('main')

@section('content')

    <div class="section-header">
        <h1>Edit Stok</h1>
    </div>

    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-5 p-3 bg-white">
            <form action="" method="post">
                <h4 class="text-center mb-3">Stok {{$data_stok[0]->nama_produk}}</h4>

                @foreach($data_stok as $stok)

                <div class="form-group row">
                    <label for="size-{{$stok->size}}" class="col-2 col-form-label">Size {{$stok->size}}</label>
                    <div class="col-10">
                        <input type="number" class="form-control" id="size-{{$stok->size}}" name="{{$stok->size}}" value="{{$stok->jumlah_stok}}">
                    </div>

                    {{-- <label for="size-{{$stok->size}}" class="col-1 col-form-label">+</label>
                    <div class="col-5">
                        <input type="number" class="form-control" id="size-{{$stok->size}}" name="{{$stok->size}}" value="{{$stok->jumlah_stok}}">
                    </div> --}}
                </div>

                @endforeach
                
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