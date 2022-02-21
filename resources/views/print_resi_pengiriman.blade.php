<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resi Pengiriman</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body>

    @php
        $jumlah_harga_sancu = 0;
        $jumlah_item_sancu = 0;
    @endphp

    <div class="container">
        {{-- detail penerima --}}
        <div class="row">
            <div class="col-8">
                <table class="table table-sm">
                    <tbody>
                        <tr>
                            <th>No Order</th>
                            <td>#{{$id_order}}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>20 Februari 2022</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{$agen->name}}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>Jalan Persahabatan VI no 3-4, Ciracas, Jakarta Timur</td>
                        </tr>
                        <tr>
                            <th>Telepon</th>
                            <td>0856-1111-2222</td>
                        </tr>
                        <tr>
                            <th>Ekspedisi</th>
                            <td>Indah Cargo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-4 d-flex align-items-center justify-content-center">
                <img src="/sancu_assets/img/logo-sancu-mini.png" alt="" class="img">
            </div>
        </div>

        {{-- detail pesanan --}}
        <div class="row">
            <h4 class="text-center">Sancu</h4>
            <div class="col-12">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Model</th>
                            <th>Size</th>
                            <th>Jumlah (pack)</th>
                            <th>Check</th>
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
                            <td><i class="bi bi-square"></i></td>
                        </tr>

                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>{{$jumlah_item_sancu}}</strong></td>
                            <td></td>
                        </tr>
                    </tbody>
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