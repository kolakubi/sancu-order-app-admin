@extends('main')

@section('content')

    <div class="section-header">
        <h1>{{$title}}</h1>
    </div>

    <table class="table" id="my_datatable">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Size</th>
                <th>Merk</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>

            @foreach($data_log as $item)
            <tr>
                <td>{{$item->id_log}}</td>
                <td>{{$item->nama_produk}}</td>
                <td>{{$item->size}}</td>
                <td>{{$item->nama_category}}</td>
                <td>{{$item->keterangan}}</td>
                <td>{{$item->created_at}}</td>
            </tr>
            @endforeach
            
        </tbody>
    </table>

@endsection