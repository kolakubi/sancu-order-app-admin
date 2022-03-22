@extends('main')

@section('content')

    <div class="section-header">
        <h1>{{$title}}</h1>
    </div>

    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-8 p-3 bg-white">
            <form action="" method="post" enctype="multipart/form-data" id="tambah_produk_form">
                @csrf
                <h5 class="text-center mb-3">Tambah Produk</h5>

                {{-- nama_produk --}}
                <div class="form-group row">
                    <label for="nama_produk" class="col-sm-3 col-form-label">*Nama Produk</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
                    </div>
                </div>

                {{-- kategori --}}
                <div class="form-group row">
                    <label for="kategori" class="col-sm-3 col-form-label">*Kategori</label>
                    <div class="col-sm-9">
                        <select class="custom-select" id="kategori" name="kategori" required>
                            <option value="0" selected>-Pilih Kategori-</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->nama_category}}</option>
                            @endforeach
                          </select>
                    </div>
                </div>

                {{-- thumbnail --}}
                <div class="form-group row">
                    <label for="nama_produk" class="col-sm-3 col-form-label">*Thumbnail</label>
                    <div class="col-sm-9">
                        <input class="form-control mal-file-input" type="file" name="file_thumb" id="file_thumb" required>
                    </div>
                </div>

                <table class="table text-center table-sm">
                    <thead>
                        <tr>
                            <th>Size</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Berat(gram)</th>
                        </tr>
                    </thead>
                    <tbody id="mal_tbody">
                        <tr>
                            <td>
                                <input type="number" class="form-control size" placeholder="size" required>
                            </td>
                            <td>
                                <input type="number" class="form-control stok" placeholder="stok" required>
                            </td>
                            <td>
                                <input type="number" class="form-control harga" placeholder="harga" required>
                            </td>
                            <td>
                                <input type="number" class="form-control berat" placeholder="berat" required>
                            </td>
                            <td>
                                <a onclick="delete_row(this)" class="btn" style="cursor: pointer"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="mb-3">
                    <button id="btn_tambah_pilihan" class="btn btn-block btn-warning"><i class="bi bi-plus-circle-dotted"></i> Tambah Pilihan</button>
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

    {{-- sweet alert --}}
    <script src="/assets/sweet-alert/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="/sancu_assets/datatables/jquery.min.js"></script>
    <script>
        const btn_tambah_pilihan = $('#btn_tambah_pilihan');
        const tbody = $('#mal_tbody');

        // tambah row
        btn_tambah_pilihan.on('click', (e)=>{
            e.preventDefault();
            tbody.append('<tr><td><input type="number" class="form-control size" placeholder="size" required></td><td><input type="number" class="form-control stok" placeholder="stok" required></td><td><input type="number" class="form-control harga" placeholder="harga" required></td><td><input type="number" class="form-control berat" placeholder="berat" required></td><td><a onclick="delete_row(this)" class="btn" style="cursor: pointer"><i class="bi bi-trash"></i></a></td> </tr>');
        })

        // hapus row
        function delete_row(elem){
            elem.preventDefault;
            let row = elem.parentElement.parentElement;
            row.parentElement.removeChild(row);
        }

        
        let form = document.getElementById('tambah_produk_form');
        form.addEventListener('submit', (e)=>{
            e.preventDefault();
            
            let namaProduk = document.getElementById('nama_produk').value;
            let kategori = document.getElementById('kategori').value;
            let size = document.getElementsByClassName('size');
            let stok = document.getElementsByClassName('stok');
            let harga = document.getElementsByClassName('harga');
            let berat = document.getElementsByClassName('berat');
            let fileThumb = document.getElementById('file_thumb');
            let detailData = [];

            // push size
            for(let i=0; i<size.length; i++){
                detailData.push({
                    'size': size[i].value,
                    'stok': stok[i].value,
                    'harga': harga[i].value,
                    'berat': berat[i].value,
                })
            }

            let fd = new FormData();
            fd.append('file', fileThumb.files[0]);
            fd.append('nama_produk', namaProduk);
            fd.append('kategori', kategori);
            fd.append('detail_data', JSON.stringify(detailData));

            console.log(detailData);

            // post request
            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch("/tambahitem", {
                headers: {
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": token
                    },
                method: "POST", 
                credentials: "same-origin",
                body: fd
            })
            .then(response => response.json())
            .then(data => {

                console.log(data);

                // jika sukses
                if(data.status == 200){
                    Swal.fire({
                        icon: 'success',
                        title: 'Produk berhasil ditambahkan',
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