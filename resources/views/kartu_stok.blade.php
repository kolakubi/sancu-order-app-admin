@extends('main')

@section('content')

    <div class="section-header">
        <h1>{{$title}}</h1>
    </div>

    <table class="table" id="my_datatable">
        <thead>
            <tr>
                {{-- <th>No</th> --}}
                <th>Id</th>
                <th>Nama</th>
                <th>Size</th>
                <th>Merk</th>
                <th>Status</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>

            @foreach($kartu_stok as $item)
            <tr>
                {{-- <td>{{$loop->iteration}}</td> --}}
                <td>{{$item->kartu_stoks_id}}</td>
                <td>{{$item->nama_produk}}</td>
                <td>{{$item->size}}</td>
                <td>{{$item->nama_category}}</td>
                <td>{{$item->status}}</td>
                <td>{{$item->jumlah}}</td>
                <td>{{$item->keterangan}}</td>
                <td>{{$item->created_at}}</td>
            </tr>
            @endforeach
            
        </tbody>
    </table>

@endsection