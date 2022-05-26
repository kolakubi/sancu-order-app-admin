@extends('main')

@section('content')

    <div class="section-header">
        <h1>Edit Produk</h1>
    </div>

    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-8 p-3 bg-white">
            <form action="" method="post" id="update_produk_form">
                @csrf
                <h5 class="text-center mb-3">Informasi Produk</h5>
                <input type="hidden" name="id_produk" value="{{$data_stok[0]->id_produk}}">
                <div class="form-group row">
                    <label for="nama_produk" class="col-sm-3 col-form-label">Nama Produk</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{$data_stok[0]->nama_produk}}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="category" class="col-sm-3 col-form-label">Merk</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="category" name="category" value="{{$data_stok[0]->nama_category}}" readonly>
                    </div>
                </div>

                {{-- gambar produk --}}
                <div class="form-group row">
                    <label for="nama_produk" class="col-sm-3 col-form-label">Gambar produk</label>
                    <div class="col-sm-9">
                        <img src="/storage/{{$data_stok[0]->gambar_url_produk}}" alt="" class="img" style="max-width: 150px;">
                        {{-- <input class="form-control mal-file-input" type="file" name="file_thumb" id="file_thumb"> --}}
                    </div>
                </div>

                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Size</th>
                            <th>Stok Sekarang (pack)</th>
                            <th>Stok Hilang/Rusak (pack)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_stok as $stok)
                        <tr>
                            <td>
                                {{$stok->size}}
                            </td>
                            <td>
                                <input type="number" class="form-control stok" data-id_produk_detail="{{$stok->id_item_detail}}" value="{{$stok->jumlah_stok}}" disabled>
                            </td>
                            <td>
                                <input type="number" class="form-control stok_keluar" data-id_produk_detail="{{$stok->id_item_detail}}" value="0" required @if($stok->jumlah_stok < 1) disabled  @endif>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <div class="form-group row">
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a class="btn btn-danger" href="{{ url()->previous() }}">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- sweet alert --}}
    <script src="/assets/sweet-alert/sweetalert2.all.min.js"></script>
    <script>
        const form = document.getElementById('update_produk_form');
        const namaProduk = document.getElementById('nama_produk');
        const stokElem = document.getElementsByClassName('stok');
        const stokKeluarELem = document.getElementsByClassName('stok_keluar');
        let stokKeluar = [];
        let totalStok = [];
        form.addEventListener('submit', (e)=>{
            e.preventDefault();

            document.getElementById('mal-loading-overlay').style.display = 'flex';

            // simpan data stok ke array baru
            for(let i=0; i<stokKeluarELem.length; i++){
                stokKeluar.push({
                    'id_produk_detail': stokKeluarELem[i].dataset.id_produk_detail,
                    'stok': stokKeluarELem[i].value,
                })
            }

            // jika pengurangan stok < 0
            // tampilkan error
            for(let i=0; i<stokKeluarELem.length; i++){
                if((parseInt(stokElem[i].value)-parseInt(stokKeluarELem[i].value)) < 0){
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan',
                        text: 'stok tidak boleh minus',
                    });
                    return false;
                }
            }

            // simpan data pemambahan stok ke array baru
            for(let i=0; i<stokKeluarELem.length; i++){
                totalStok.push({
                    'id_produk_detail': stokKeluarELem[i].dataset.id_produk_detail,
                    'stok': parseInt(stokElem[i].value)-parseInt(stokKeluarELem[i].value),
                })
            }

            let dataJson = {
                'id': '{{$data_stok[0]->id_produk}}',
                'nama_produk': namaProduk.value,
                'stok_keluar': stokKeluar,
                'total_stok' :totalStok
            }

            // post request
            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch("/stok_keluar/add/{{$data_stok[0]->id_produk}}", {
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": token
                    },
                method: "POST", 
                credentials: "same-origin",
                body: JSON.stringify(dataJson)
            })
            .then(response => response.json())
            .then(data => {

            console.log(data);
            document.getElementById('mal-loading-overlay').style.display = 'none';

                // jika sukses
                if(data.status == 200){
                    Swal.fire({
                        icon: 'success',
                        title: 'Data berhasil diupdate',
                    }).then((result) => {
                        location.reload();
                    })
                }
                // jika gagal
                else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan',
                        text: 'periksa kembali data',
                    }).then((result) => {
                        // location.reload();
                    })
                }
            })
        })
    </script>

@endsection