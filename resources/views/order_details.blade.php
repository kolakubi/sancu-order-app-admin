@extends('main')

@section('content')
<div class="section-header">
    <h1>Orders # {{$id_order}} {{$agen->name}}</h1>
</div>

@if(session('add_berhasil'))
    <div class="alert alert-success" role="alert">
        {{ session('add_berhasil') }}
    </div>
@endif

{{-- error ongkir --}}
@error('ongkir')
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
@enderror
@error('ekspedisi')
<div class="alert alert-danger" role="alert">
    {{$message}}
</div>
@enderror

{{-- error upload resi --}}
@error('file_resi')
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
@enderror

{{-- tes table dynamic table --}}

@php
    $asd = 0;
    $sub_harga_per_category = 0;
    $total_jumlah_harga = 0;
    $total_berat = 0;
    $total_jumlah_produk = 0;
    $potongan_harga_langsung = (int)$alamat->potongan_harga_langsung;
    $penambahan_harga_langsung = (int)$alamat->penambahan_harga_langsung;
@endphp

@foreach($orders as $key=>$order)

    @php
        $total_jumlah_harga += ($order->harga_produk*$order->jumlah_produk);
        $total_jumlah_produk += $order->jumlah_produk;
        $total_berat += ($order->berat*$order->jumlah_produk);
    @endphp

    {{-- jika idproduk beda dengan var pembantu --}}
    {{-- buat header table --}}
    {{-- jadikan variable helper = id_produk --}}
    @if($order->id_category != $asd)

        @php
            $asd = $order->id_category;
            $sub_harga_per_category = 0;
        @endphp

        <div class="card card-info card-outline">
            <div class="card-header" style="min-height: 0; padding: 10px 28px">  
                <h4 class="text-dark">{{$order->nama_category}}</h4>
            </div>
            
            <div class="card-body">
                <table class="table table-hover table-sm">
                    <thead class="bg-info text-white">
                        <tr style="background-color: rgba(0,0,0,0.3)">
                            <th>No</th>
                            <th>Model</th>
                            <th>Size</th>
                            <th>Jumlah (pack)</th>
                            <th>Jmlh Harga</th>
                        </tr>
                    </thead>
                    <tbody>
    @endif
        @php
            $sub_harga_per_category += ($order->harga_produk*$order->jumlah_produk);
        @endphp
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$order->nama_produk}}</td>
            <td>{{$order->size}}</td>
            <td>{{$order->jumlah_produk}}</td>
            <td>Rp{{ number_format($order->jumlah_produk*$order->harga_produk, 0, '.', ',')}}</td>
        </tr>

        {{-- jika index berikutnya sudah berbeda id --}}
        {{-- buat footer table --}}
        @if(isset($orders[$key+1]))
            @if($orders[$key+1]->id_category != $asd)
                </tbody>
                </table>
                </div><!-- end card body -->
                <div class="card-footer text-right border-top">
                    <h6 class="text-dark">
                        Total Pembelian {{$order->nama_category}}:
                        <strong>
                            Rp{{number_format($sub_harga_per_category, '0', '.', ',')}}
                        </strong>
                    </h6>
                </div>
            </div>
            @endif
        @endif  

        {{-- jika item terakhir dalam loop --}}
        {{-- buat footer table --}}
        @if($loop->last)
            </tbody>
            </table>
            </div><!-- end card body -->
            <div class="card-footer text-right border-top">
                <h6 class="text-dark">
                    Total Pembelian {{$order->nama_category}}:
                    <strong>
                        Rp{{number_format($sub_harga_per_category, '0', '.', ',')}}
                    </strong>
                </h6>
            </div>
        </div>
        @endif

@endforeach

{{-- end tes table dynamic table --}}
{{-- ------------------------------------------------------------------------------------------------------------ --}}


{{-- Detail Order --}}
<div class="card card-info card-outline">
    <div class="card-header">  
        <h4>Detail Order</h4>
    </div>
    <div class="card-body">
        <table class="table table-sm table-striped">
            <tbody>
                <tr>
                    <td>Tanggal Order</td>
                    <td>{{$tgl_order}}</td>
                </tr>
                <tr>
                    <td>Export Detail Pesanan</td>
                    <td><a class="btn btn-warning" href="/ordersdetails/export/{{$order->id_order}}">Export Excel</a></td>
                </tr>
                {{-- batalkan pesanan --}}
                @if($alamat->status == "1" || $alamat->status == "2")
                <tr>
                    <td style="width: 25%">Batalkan Pesanan</td>
                    <td>
                        <a id="batalkan_order" data-idorder="{{$id_order}}" onclick="batalkan_pesanan(this)" href="#" class="btn btn-danger">Batalkan Pesanan</a><br>
                        @if($selisih_hari > 3) <span class="text-danger text-bold pt-2">(Order sudah lebih dari 3 hari, silakan batalkan)</span>  @endif
                    </td>
                </tr>
                @endif
                <tr style="border-bottom: 2px solid black;">
                    <td>Cetak Detail Packing</td>
                    <td>
                        <a href="/printdetailpacking/{{$id_order}}" target="_blank" class="btn btn-info">Cetak Detail Packing</a>
                    </td>
                </tr>
                <tr>
                    <td>Total Pembelian</td>
                    <td>: Rp{{
                            number_format($total_jumlah_harga, '0', '.', ',')
                        }}
                    </td>
                </tr>
                <tr>
                    <td>Total Berat</td>
                    <td>: {{number_format($total_berat, 0, '.', ',')}}g</td>
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
                    <td>Total potongan harga Kupon</td>
                    <td>: Rp{{
                        $coupon != null ? 
                        number_format(($total_jumlah_produk)*$coupon->potongan, '0', '.', ',') : 0
                    }}</td>
                </tr>

                {{-- alamat pengiriman --}}
                {{-- jika dropship --}}
                @if($alamat->dropship)
                    <tr style="border-top: 2px solid black;">
                        <td>
                            <button class="btn text-danger border-2 border-danger" style="font-size: 10px; text-transform: uppercase; font-weight: bold">Sebagai Dropship</button>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Alamat pengirim</td>
                        <td>:
                            {{$alamat->nama_lengkap}}<br>
                            {{$alamat->telepon}}<br>
                            {{$alamat->alamat_lengkap}}<br>
                            {{$alamat->kecamatan}}, {{$alamat->kota_kabupaten}}, {{$alamat->propinsi}}, {{$alamat->kode_pos}}
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat penerima</td>
                        <td>:
                            {{$alamat->dropship_nama}}<br>
                            {{$alamat->dropship_telepon}}<br>
                            {{$alamat->dropship_alamat}}
                        </td>
                    </tr>
                    <tr style="border-bottom: 2px solid black;">
                        <td>Ganti Alamat penerima</td>
                        <td>
                            <form action="/orders/edit_alamat_dropship" method="post">
                                @csrf
                                <input type="hidden" name="orders_id" value="{{$id_order}}">
                                <input class="form-control mb-2" name="nama_dropship" type="text" placeholder="Nama Penerima" required>
                                @error('nama_dropship')<div class="alert alert-danger" role="alert">{{$message}}</div>@enderror
                                <input class="form-control mb-2" name="telepon_dropship" type="text" placeholder="Telepon Penerima" required>
                                @error('telepon_dropship')<div class="alert alert-danger" role="alert">{{$message}}</div>@enderror
                                <input class="form-control mb-2" name="alamat_dropship" type="text" placeholder="Alamat Lengkap Penerima" required>
                                @error('alamat_dropship')<div class="alert alert-danger" role="alert">{{$message}}</div>@enderror
                                <button type="submit" class="btn btn-info mt-2" @if($agen->status == '5' || $agen->status == '0') disabled  @endif>Ganti Penerima Dropship</button>
                            </form>
                        </td>
                    </tr>
                @else
                    <tr style="border-bottom: 2px solid black;">
                        <td>Alamat pengiriman</td>
                        <td>:
                            {{$alamat->nama_lengkap}}<br>
                            {{$alamat->telepon}}<br>
                            {{$alamat->alamat_lengkap}}<br>
                            {{$alamat->kecamatan}}, {{$alamat->kota_kabupaten}}, {{$alamat->propinsi}}, {{$alamat->kode_pos}}
                        </td>
                    </tr>
                @endif
                <tr style="border-bottom: 2px solid black;">
                    <td><h4>Pesan Dari Agen<h4></td>
                    <td>:
                        {{$alamat->keterangan_agen}}
                    </td>
                </tr>

                {{-- ongkir --}}
                <form action="{{ route('update_ongkir') }}" method="post" class="row">
                    @csrf
                    <input type="hidden" name="orders_id" value="{{$id_order}}">
                    <input type="hidden" name="user_id" value="{{$alamat->id_user}}">
                    <tr>
                        <td><h4>Ongkir</h4></td>
                        <td>
                            @error('ongkir')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                            
                            <div class="col-8">
                                <input type="text" placeholder="Input Ongkir" value="{{$ongkir}}" class="form-control" name="ongkir" @if($agen->status == '5' || $agen->status == '0') disabled  @endif>
                            </div> 
                        </td>
                    </tr>
                    <tr>
                        <td>Ekspedisi</td>
                        <td>
                            @error('ekspedisi')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                            <div class="col-8">
                                <input type="text" placeholder="Input ekspedisi" value="{{$alamat->ekspedisi}}" class="form-control" name="ekspedisi" @if($agen->status == '5' || $agen->status == '0') disabled  @endif>
                            </div>
                        </td>
                    </tr>
                    <tr style="border-bottom: 2px solid black;">
                        <td></td>
                        <td>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-info" @if($agen->status == '5' || $agen->status == '0') disabled  @endif>Update Ongkir</button>
                            </div>     
                        </td>
                    </tr>
                </form>

                {{-- potongan harga langsung --}}
                <form action="{{ route('update_potongan_harga_langsung') }}" method="post" class="row">
                    @csrf
                    <input type="hidden" name="orders_id" value="{{$id_order}}">
                    <tr>
                        <td><h4>Potongan harga langsung</h4></td>
                        <td>
                            @error('potongan_harga_langsung')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                            
                            <div class="col-8">
                                <input type="text" placeholder="Input Potongan harga" value="{{$potongan_harga_langsung}}" class="form-control" name="potongan_harga_langsung" @if($agen->status == '5' || $agen->status == '0') disabled  @endif>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>
                            @error('keterangan_potongan_harga_langsung')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                            
                            <div class="col-8">
                                <input type="text" placeholder="keterangan potongan harga..." value="{{$alamat->keterangan_potongan_harga_langsung}}" class="form-control" name="keterangan_potongan_harga_langsung" @if($agen->status == '5' || $agen->status == '0') disabled  @endif>
                            </div>
                        </td>
                    </tr>
                    <tr style="border-bottom: 2px solid black;">
                        <td></td>
                        <td>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-info" @if($agen->status == '5' || $agen->status == '0') disabled  @endif>Update Potongan Harga</button>
                            </div>
                        </td>
                    </tr>
                </form>

                {{-- penambahan harga langsung --}}
                <form action="{{ route('update_penambahan_harga_langsung') }}" method="post" class="row">
                    @csrf
                    <input type="hidden" name="orders_id" value="{{$id_order}}">
                    <tr>
                        <td><h4>Penambahan harga langsung</h4></td>
                        <td>
                            @error('penambahan_harga_langsung')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                            
                            <div class="col-8">
                                <input type="text" placeholder="Input penambahan harga" value="{{$penambahan_harga_langsung}}" class="form-control" name="penambahan_harga_langsung" @if($agen->status == '5' || $agen->status == '0') disabled  @endif>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>
                            @error('keterangan_penambahan_harga_langsung')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                            
                            <div class="col-8">
                                <input type="text" placeholder="keterangan penambahan harga..." value="{{$alamat->keterangan_penambahan_harga_langsung}}" class="form-control" name="keterangan_penambahan_harga_langsung" @if($agen->status == '5' || $agen->status == '0') disabled  @endif>
                            </div>
                        </td>
                    </tr>
                    <tr style="border-bottom: 2px solid black;">
                        <td></td>
                        <td>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-info" @if($agen->status == '5' || $agen->status == '0') disabled  @endif>Update Penambahan Harga</button>
                            </div>
                        </td>
                    </tr>
                </form>

                {{-- Keterangan Packing --}}
                <form action="{{ route('update_keterangan_packing') }}" method="post" class="row">
                    @csrf
                    <input type="hidden" name="orders_id" value="{{$id_order}}">
                    <tr>
                        <td><h4>Keterangan Packing</h4></td>
                        <td>
                            @error('keterangan_packing')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                            
                            <div class="col-8">
                                <textarea placeholder="keterangan packing..." rows="5" class="form-control" name="keterangan_packing" @if($agen->status == '5' || $agen->status == '0') disabled  @endif style="height: auto;">{{$alamat->keterangan_packing}}</textarea>
                            </div>
                        </td>
                    </tr>
                    <tr style="border-bottom: 2px solid black;">
                        <td></td>
                        <td>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-info" @if($agen->status == '5' || $agen->status == '0') disabled  @endif>Update Keterangan Packing</button>
                            </div>
                        </td>
                    </tr>
                </form>

                {{-- grand total --}}
                <tr style="border-bottom: 2px solid black;">
                    <td><h4>Grand Total</h4></td>
                    <td class="text-dark">
                        : Rp
                            {{number_format(
                                (
                                    $total_jumlah_harga
                                )
                                +
                                $ongkir
                                -
                                (
                                    $coupon != null ? 
                                    (
                                        $total_jumlah_produk
                                    )
                                    *
                                    $coupon->potongan : 0
                                )
                                -
                                $potongan_harga_langsung
                                +
                                $penambahan_harga_langsung
                                , '0'
                            )
                        }}
                    </td>
                </tr>
                {{-- Pesanan Selesai --}}
                <tr style="border-bottom: 2px solid black;">
                    <td><h4 class="text-success">Pesanan Selesai<h4></td>
                    <td>: silakan klik tombol di bawah Jika Pesanan Telah Selesai
                        <br>
                        <a id="pesanan_selesai" data-idorder="{{$id_order}}" onclick="pesanan_selesai(this)" href="#" class="btn btn-success">Pesanan Telah Selesai</a>
                    </td>
                </tr>

                {{-- Bukti pembayaran --}}
                @if($agen->status >= '3')
                <tr style="border-bottom: 2px solid black;">
                    <td>Bukti Pembayaran</td>
                    <td>
                        <p>klik gambar untuk memperbesar</p>
                        <a href="{{$client_host}}{{$agen->bukti_bayar}}" target="_blank">
                            <img class="img-thumbnail" style="max-width: 200px;" src="{{$client_host}}{{$agen->bukti_bayar}}" alt="">
                        </a>
                    </td>
                </tr>
                {{-- Resi pengiriman --}}
                <tr>
                    <td>Resi Pengiriman</td>
                    <td>
                        <form action="{{route('update_resi')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="orders_id" value="{{$id_order}}">
                            <input type="hidden" name="user_id" value="{{$alamat->id_user}}">
                            <input class="form-control" type="file" name="file_resi" required @if($agen->status == '5' || $agen->status == '0') disabled  @endif>

                            @error('file_resi')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror

                            <span>Max Size: 2MB</span>
                            <br>
                            <br>

                            <button type="submit" class="btn btn-success" @if($agen->status == '5' || $agen->status == '0') disabled  @endif>Upload Resi Pengiriman</button>
                        </form>

                        @if($agen->status >= '4')
                            <div class="col-12 mt-4">
                                <img class="img-thumbnail" src="/storage/{{$agen->resi}}" alt="" style="max-width: 300px">
                            </div>
                        @endif
                    </td>
                </tr>
                @endif

            </tbody>
        </table>
    </div> <!-- end card-body -->
</div>

{{-- sweet alert --}}
<script src="/assets/sweet-alert/sweetalert2.all.min.js"></script>
<script>
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    function batalkan_pesanan(elem){
        elem.preventDevault;
        let idPesanan = elem.dataset.idorder;

        Swal.fire({
            icon: 'question',
            title: 'Yakin ingin membatalkan order ini',
            showDenyButton: true,
            confirmButtonText: 'Ya',
            denyButtonText: `Tidak`,
        }).then((result) => {
            if (result.isConfirmed) {
                // ajax ke pengecekan stok
                fetch("/orders/batal", {
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json, text-plain, */*",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-TOKEN": token
                        },
                    method: "POST", 
                    credentials: "same-origin",
                    body: idPesanan
                })
                .then(response => response.json())
                .then(data => {

                    if(data.status == '200'){
                        Swal.fire('Saved!', '', 'success')
                        .then((result)=>{
                            location.reload();
                        })
                    }
                    else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Ada kesalahan',
                        })
                    }
                    console.log(data);
                })
            }
        })
    }

    function pesanan_selesai(elem){
        elem.preventDevault;
        let idPesanan = elem.dataset.idorder;

        Swal.fire({
            icon: 'question',
            title: 'Yakin pesanan ini sudah selesai?',
            showDenyButton: true,
            confirmButtonText: 'Ya',
            denyButtonText: `Tidak`,
        }).then((result) => {
            if (result.isConfirmed) {
                // ajax ke pengecekan stok
                fetch("/orders/selesai", {
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json, text-plain, */*",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-TOKEN": token
                        },
                    method: "POST", 
                    credentials: "same-origin",
                    body: idPesanan
                })
                .then(response => response.json())
                .then(data => {

                    if(data.status == '200'){
                        Swal.fire('Saved!', '', 'success')
                        .then((result)=>{
                            location.reload();
                        })
                    }
                    else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Ada kesalahan',
                        })
                    }
                    console.log(data);
                })
            }
        })
    }
    
</script>

@endsection