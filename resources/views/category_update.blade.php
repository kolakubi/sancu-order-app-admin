@extends('main')

@section('content')
    
<div class="section-header">
    <h1>{{$title}}</h1>
</div>

@if(session('add_berhasil'))
    <div class="alert alert-success" role="alert">
        {{ session('add_berhasil') }}
    </div>
@endif

<div class="row d-flex align-items-center justify-content-center">
    <div class="col-6 p-4 bg-white">
        <h4 class="text-center mb-4">Data Category</h4>

        <form action="" method="post">
            @csrf
            @method('PATCH')

            @if(session('error_nama'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error_nama') }}
                </div>
            @endif

            {{-- hidden input --}}
            <input type="hidden" name="id" value="{{$category->id}}">

            <div class="form-group row">
                <label for="nama_category" class="col-sm-3 col-form-label">Nama (unique)</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama_category" name="nama_category" placeholder="Nama category..." required value="{{$category->nama_category}}">
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