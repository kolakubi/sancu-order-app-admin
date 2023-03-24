<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Packing</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>
        body{
            font-size: 11px!important;
            font-weight: bold!important;
            color: #000!important;
        }
        .container{
            max-width: 900px;
        }
        
    </style>
</head>
<body>
    <div class="container">
        {{-- detail penerima --}}
        <div class="row">
            <div class="col-8">
                <div class="row">
                    <div class="col-6">
                        <table class="table table-sm">
                            <tbody>
                                <tr>
                                    <th>No Order</th>
                                    <td>#{{$id_order}}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td>{{$orders[0]->tanggal_order}}</td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{$agen->name}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    {{-- alamat --}}
                    @if($alamat->dropship)
                        <div class="col-6">
                            <button class="btn text-danger border-2 border-danger" style="font-size: 10px; text-transform: uppercase; font-weight: bold">Sebagai Dropship</button>
                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <th>Alamat penerima</th>
                                        <td>{{$alamat->dropship_nama}}, {{$alamat->dropship_alamat}}</td>
                                    </tr>
                                    <tr>
                                        <th>Telepon penerima</th>
                                        <td>{{$alamat->dropship_telepon}}</td>
                                    </tr>
                                    <tr style="border-top: 2px solid black;">
                                        <th>Alamat Pengirim</th>
                                        <td>{{$alamat->alamat_lengkap}}, {{$alamat->kecamatan}}, {{$alamat->kota_kabupaten}}, {{$alamat->propinsi}}, {{$alamat->kode_pos}}</td>
                                    </tr>
                                    <tr>
                                        <th>Telepon pengirim</th>
                                        <td>{{$alamat->telepon}}</td>
                                    </tr>
                                    <tr>
                                        <th>Ekspedisi</th>
                                        <td>{{$alamat->ekspedisi}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="col-6">
                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{$alamat->alamat_lengkap}}, {{$alamat->kecamatan}}, {{$alamat->kota_kabupaten}}, {{$alamat->propinsi}}, {{$alamat->kode_pos}}</td>
                                    </tr>
                                    <tr>
                                        <th>Telepon</th>
                                        <td>{{$alamat->telepon}}</td>
                                    </tr>
                                    <tr>
                                        <th>Ekspedisi</th>
                                        <td>{{$alamat->ekspedisi}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-4 d-flex align-items-center justify-content-center">
                <img src="/sancu_assets/img/logo-sancu-mini.png" alt="" class="img">
            </div>
        </div>

        {{-- tes table dynamic table --}}
        @php
            $asd = 0;
            $sub_harga_per_category = 0;
            $sub_item_per_category = 0;
            $total_jumlah_harga = 0;
            $total_berat = 0;
            $total_jumlah_produk = 0;
        @endphp

        @foreach($orders as $key=>$order)
            {{-- jika idproduk beda dengan var pembantu --}}
            {{-- buat header table --}}
            {{-- jadikan variable helper = id_produk --}}
            @if($order->id_category != $asd)

                @php
                    $asd = $order->id_category;
                    $sub_harga_per_category = 0;   
                    $sub_item_per_category = 0;   
                @endphp

                <div class="row">
                    <h6 class="">{{$order->nama_category}}</h6>
                    <div class="col-12">
                        <table class="table table-sm table-bordered">
                            {{-- <thead style="background: rgba(0,0,0,0.1);"> --}}
                                <tr>
                                    <th>No</th>
                                    <th>Model</th>
                                    <th>Size</th>
                                    <th>Jumlah (pack)</th>
                                    <th>Harga</th>
                                    <th>Check 1</th>
                                    <th>Check 2</th>
                                </tr>
                            {{-- </thead> --}}
                            <tbody>
            @endif

            @php
                $sub_harga_per_category += ($order->harga_saat_order*$order->jumlah_produk);
                $sub_item_per_category += $order->jumlah_produk;
                $total_jumlah_produk += $order->jumlah_produk;
                $total_jumlah_harga += ($order->harga_saat_order*$order->jumlah_produk);
                
            @endphp

            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$order->nama_produk}}</td>
                <td>{{$order->size}}</td>
                <td>{{$order->jumlah_produk}}</td>
                <td>Rp {{number_format($order->harga_saat_order*$order->jumlah_produk, 0)}}</td>
                <td><i class="bi bi-square"></i></td>
                <td><i class="bi bi-square"></i></td>
            </tr>

            {{-- jika index berikutnya sudah berbeda id --}}
            {{-- buat footer table --}}
            @if(isset($orders[$key+1]))
                @if($orders[$key+1]->id_category != $asd)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>{{$sub_item_per_category}}</strong></td>
                                    <td><strong>Rp {{number_format($sub_harga_per_category, 0)}}</strong></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>
                @endif
            @endif

            {{-- jika item terakhir dalam loop --}}
            {{-- buat footer table --}}
            @if($loop->last)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>{{$sub_item_per_category}}</strong></td>
                            <td><strong>Rp {{number_format($sub_harga_per_category, 0)}}</strong></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                </div>
                </div>
            @endif
        @endforeach
        {{-- end tes table dynamic table --}}
        {{-- ------------------------------------------------------------------------------------------------------------ --}}

        <div class="row">
            <h6>Detail Pesanan</h6>
            <div class="col-6">
                <table class="table table-sm">
                    <tr>
                        <td><strong>Keterangan Tambahan</strong></td>
                        <td>: {{$agen->keterangan_packing}}</td>
                    </tr>
                    <tr>
                        <td><strong>Jumlah Item</strong></td>
                        <td>: {{$total_jumlah_produk}}</td>
                    </tr>
                    <tr>
                        <td><strong>Total Pembelian</strong></td>
                        <td>: Rp {{number_format($total_jumlah_harga, 0)}}</td>
                    </tr>
                    <tr>
                        <td><strong>Ongkir</strong></td>
                        <td>: Rp {{number_format($alamat->ongkir)}}</td>
                    </tr>
                    <tr>
                        <td><strong>Coupon</strong></td>
                        <td>: {{$coupons != null ? $coupons->name : '-'}}</td>
                    </tr>
                    <tr>
                        <td><strong>Potongan Coupon</strong></td>
                        <td>: ( Rp{{$coupons ? number_format($coupons->potongan*$total_jumlah_produk, 0) : '-'}} )</td>
                    </tr>
                </table>
            </div>
            <div class="col-6">
                <table class="table table-sm">
                    @if($alamat->potongan_harga_langsung)
                        <tr>
                            <td><strong>Potongan Harga Langsung</strong></td>
                            <td>: Rp {{number_format($alamat->potongan_harga_langsung, 0)}}</td>
                        </tr>
                        <tr>
                            <td><strong>Keterangan</strong></td>
                            <td>: {{$alamat->keterangan_potongan_harga_langsung}}</td>
                        </tr>
                    @endif
                    @if($alamat->penambahan_harga_langsung)
                        <tr>
                            <td><strong>Penambahan Harga Langsung</strong></td>
                            <td>: Rp {{number_format($alamat->penambahan_harga_langsung, 0)}}</td>
                        </tr>
                        <tr>
                            <td><strong>Keterangan</strong></td>
                            <td>: {{$alamat->keterangan_penambahan_harga_langsung}}</td>
                        </tr>
                    @endif
                    
                    <tr>
                        <td><strong>Grand Total</strong></td>
                        <td><strong>: Rp 
                            {{
                                number_format((
                                    $total_jumlah_harga+
                                    $alamat->ongkir-
                                    ($coupons ? $coupons->potongan*$total_jumlah_produk : 0)-
                                    $alamat->potongan_harga_langsung+
                                    $alamat->penambahan_harga_langsung
                                ), 0)
                            }}
                        <strong></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row mt-4">
            <p class="text-center"><span style="text-decoration: underline">Sancu Creative Indonesia</span><br>
                Kolonel Sugiono No.55 AA, Ngeni, Kepuhkiriman, Kec. Waru, Kabupaten Sidoarjo, Jawa Timur 61256</p>
        </div>

    </div> <!-- end container -->
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        window.print();
    </script>
</body>
</html>