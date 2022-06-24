@extends('main')

@section('content')

    <div class="section-header">
        <h1>{{$title}}</h1>
    </div>

    <table class="table" id="my_datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Order Id</th>
                <th>Nama Agen</th>
                <th>Tipe</th>
                <th>Tanggal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notifications as $notif)
                <tr style="@if(!$notif->dilihat)background-color: #ffeded;@endif">
                    <td>{{$notif->id}}</td>
                    <td>{{$notif->id_order}}</td>
                    <td>{{$notif->name}}</td>
                    <td>{{$notif->tipe}}</td>
                    <td>{{$notif->waktu_notif}}</td>
                    <td>
                        <a class="btn btn-info" href="/notification/read/{{$notif->id}}">
                            Lihat 
                            <i class="bi bi-eye"></i>
                        </a>
                    </td>
                </tr>
           @endforeach
        </tbody>
    </table>

@endsection