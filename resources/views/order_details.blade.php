@extends('main')

@section('content')

@php
    $jumlah_harga_sancu = 0;
    $jumlah_harga_boncu = 0;
    $jumlah_harga_pretty = 0;
    $jumlah_harga_xtreme = 0;
    $jumlah_item_sancu = 0;
    $jumlah_item_boncu = 0;
    $jumlah_item_pretty = 0;
    $jumlah_item_xtreme = 0;
@endphp
    
<div class="section-header">
    <h1>Orders # {{$id_order}} {{$agen}}</h1>
</div>

<div class="card card-info card-outline">
    <div class="card-header">  
        <h4>Sancu</h4> <br><a class="btn btn-warning" href="/ordersdetails/export">Export Excel Sancu</a>
    </div>

    <div class="card-body">
        <table class="table table-hover table-sm ">
            <thead class="bg-info text-white">
                <tr>
                    <th>No</th>
                    <th>Model</th>
                    <th>Size</th>
                    <th>Jumlah (pack)</th>
                    <th>Jmlh Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_sancu as $sancu)

                @php
                    $jumlah_harga_sancu += ($sancu->jumlah_produk*$sancu->harga_produk);
                    $jumlah_item_sancu += $sancu->jumlah_produk;
                @endphp
                
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$sancu->nama_produk}}</td>
                    <td>{{$sancu->size}}</td>
                    <td>{{$sancu->jumlah_produk}}</td>
                    <td>Rp{{ number_format($sancu->jumlah_produk*$sancu->harga_produk, 0, '.', ',')}}</td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div><!-- end card body -->
    <div class="card-footer text-right border-top">
        <h6>
            Total Pembelian Sancu:
            <strong>
                 Rp{{number_format($jumlah_harga_sancu, '0', '.', ',')}}
            <strong>
        </h6>
    </div>
</div>

<div class="card card-success card-outline">
    <div class="card-header">  
        <h4>Boncu</h4>
        <button class="btn btn-warning">Export Excel Boncu</button>
    </div>
    
    <div class="card-body">
        <table class="table table-hover table-sm ">
            <thead class="bg-success text-white">
                <tr>
                    <th>No</th>
                    <th>Model</th>
                    <th>Size</th>
                    <th>Jumlah (pack)</th>
                    <th>Jmlh Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_boncu as $boncu)

                @php
                    $jumlah_harga_boncu += ($boncu->jumlah_produk*$boncu->harga_produk);
                    $jumlah_item_boncu += $boncu->jumlah_produk;
                @endphp
                
                <tr>
                    <td>1</td>
                    <td>{{$boncu->nama_produk}}</td>
                    <td>{{$boncu->size}}</td>
                    <td>{{$boncu->jumlah_produk}}</td>
                    <td>Rp{{ number_format($boncu->jumlah_produk*$boncu->harga_produk, 0, '.', ',')}}</td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div> <!-- end card body -->
    <div class="card-footer text-right border-top">
        <h6>
            Total Pembelian Boncu:
            <strong>
                 Rp{{number_format($jumlah_harga_boncu, '0', '.', ',')}}
            <strong>
        </h6>
    </div>
</div>

<div class="card card-danger card-outline">
    <div class="card-header">  
        <h4>Pretty</h4>
        <button class="btn btn-warning">Export Excel Pretty</button>
    </div>

    <div class="card-body">
        <table class="table table-hover table-sm ">
            <thead class="bg-danger text-white">
                <tr>
                    <th>No</th>
                    <th>Model</th>
                    <th>Size</th>
                    <th>Jumlah (pack)</th>
                    <th>Jmlh Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_pretty as $pretty)

                @php
                    $jumlah_harga_pretty += ($pretty->jumlah_produk*$pretty->harga_produk);
                    $jumlah_item_pretty += $pretty->jumlah_produk;
                @endphp
                
                <tr>
                    <td>1</td>
                    <td>{{$pretty->nama_produk}}</td>
                    <td>{{$pretty->size}}</td>
                    <td>{{$pretty->jumlah_produk}}</td>
                    <td>Rp{{ number_format($pretty->jumlah_produk*$pretty->harga_produk, 0, '.', ',')}}</td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div><!-- end card body -->
    <div class="card-footer text-right border-top">
        <h6>
            Total Pembelian Pretty:
            <strong>
                 Rp{{number_format($jumlah_harga_pretty, '0', '.', ',')}}
            <strong>
        </h6>
    </div>
</div>

<div class="card card-dark card-outline">
    <div class="card-header">  
        <h4>Xtreme </h4>
        <button class="btn btn-warning">Export Excel Xtreme</button>
    </div>

    <div class="card-body">
        <table class="table table-hover table-sm ">
            <thead class="bg-dark text-white">
                <tr>
                    <th>No</th>
                    <th>Model</th>
                    <th>Size</th>
                    <th>Jumlah (pack)</th>
                    <th>Jmlh Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_xtreme as $xtreme)

                @php
                    $jumlah_harga_xtreme += ($xtreme->jumlah_produk*$xtreme->harga_produk);
                    $jumlah_item_xtreme += $xtreme->jumlah_produk;
                @endphp
                
                <tr>
                    <td>1</td>
                    <td>{{$xtreme->nama_produk}}</td>
                    <td>{{$xtreme->size}}</td>
                    <td>{{$xtreme->jumlah_produk}}</td>
                    <td>Rp{{ number_format($xtreme->jumlah_produk*$xtreme->harga_produk, 0, '.', ',')}}</td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div><!-- end card body -->
    <div class="card-footer text-right border-top">
        <h6>
            Total Pembelian Xtreme:
            <strong>
                 Rp{{number_format($jumlah_harga_xtreme, '0', '.', ',')}}
            <strong>
        </h6>
    </div>
</div>

<div class="card card-info card-outline">
    <div class="card-header">  
        <h4>Perhitungan</h4>
    </div>
    <div class="card-body">
        <table class="table table-sm">
            <tbody>
                <tr>
                    <td>Total Pembelian</td>
                    <td>: Rp{{
                            number_format(
                            $jumlah_harga_sancu+
                            $jumlah_harga_boncu+
                            $jumlah_harga_pretty+
                            $jumlah_harga_xtreme, '0', '.', ',')
                        }}
                    </td>
                </tr>
                <tr>
                    <td>Diskon/Kupon</td>
                    <td>: {{$coupon != null ? $coupon->name : '-'}}</td>
                </tr>
                <tr>
                    <td>Potongan harga</td>
                    <td>: Rp{{$coupon != null ? number_format($coupon->potongan, '0', '.', ',') : 0}} / psg</td>
                </tr>
                <tr>
                    <td>Total potongan harga</td>
                    <td>: Rp{{
                        $coupon != null ? 
                        number_format((
                        $jumlah_item_sancu+
                        $jumlah_item_boncu+
                        $jumlah_item_pretty+
                        $jumlah_item_xtreme)*$coupon->potongan, '0', '.', ',') : 0
                    }}</td>
                </tr>
                <tr>
                    <td>Ongkir</td>
                    <td>
                        <form action="{{ route('update_ongkir') }}" method="post" class="row">
                            @csrf
                            <input type="hidden" name="orders_id" value="{{$id_order}}">
                            <div class="col-8">
                                <input type="text" placeholder="Input Ongkir" value="{{$ongkir}}" class="form-control" name="ongkir">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-info">Update</button>
                            </div>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div> <!-- end card-body -->
</div>

@endsection