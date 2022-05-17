@extends('main')

@section('content')

    <div class="section-header">
        <h1>{{$title}}</h1>
    </div>

    <div class="row p-3">
        <div class="col-4 bg-white p-3">
            <form method="post">
                @csrf
                <div class="mb-3 form-group">
                    <label for="item" class="form-label">Item</label>
                    <select id="elem_produk" name="item" class="form-control">
                        <option value="">- pilih item -</option>
                    </select>
                </div>
                <div class="mb-3 form-group">
                    <label for="item" class="form-label">Size</label>
                    <select id="elem_size" name="id_produk_detail" class="form-control">
                        <option value="">- pilih size -</option>
                    </select>
                </div>
                <div class="mb-3">
                  <label for="tanggaldari" class="form-label">Tanggal dari</label>
                  <input type="date" class="form-control" id="tanggaldari" aria-describedby="tanggaldari" name="tanggaldari" required>
                </div>
                <div class="mb-3">
                    <label for="tanggalsampai" class="form-label">sampai</label>
                    <input type="date" class="form-control" id="tanggalsampai" aria-describedby="tanggalsampai" name="tanggalsampai" required>
                  </div>
                <button type="submit" class="btn btn-primary">Cek Kartu Stok</button>
            </form>
        </div>
    </div>

    <table class="table" id="my_datatable">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Size</th>
                <th>In</th>
                <th>Out</th>
                <th>Keterangan</th>
                <th>Saldo</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @if(count($kartu_stok) > 0)
                @foreach($kartu_stok as $item)
                <tr>
                    <td>{{$item->kartu_stoks_id}}</td>
                    <td>{{$item->nama_produk}}</td>
                    <td>{{$item->size}}</td>
                    <td class="{{$item->status == 'in' ? 'text-info' : ''}}">{{$item->status == 'in' ? $item->jumlah : '0'}}</td>
                    <td class="{{$item->status == 'out' ? 'text-danger' : ''}}">{{$item->status == 'out' ? $item->jumlah : '0'}}</td>
                    <td>{{$item->keterangan}}</td>
                    <td>{{$item->saldo}}</td>
                    <td>{{$item->kartu_stok_tanggal}}</td>
                </tr>
                @endforeach
            @endif
            
        </tbody>
    </table>

    <script>
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const elem_produk = document.getElementById('elem_produk');
        const elem_size = document.getElementById('elem_size');

        // get produk list
        fetch('/kartu_stok/get_produk', {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                },
            method: "GET", 
            credentials: "same-origin",
        })
        .then(response => response.json())
        .then(produk => {
                // console.log(produk);

                elem_produk.innerHTML = '';
                produk.forEach(element => {
                    elem_produk.innerHTML += 
                    '<option value="'+element.id+'">'+element.nama_produk+'</option>'             
                });

            })
        .catch(function(error) {
            console.log(error);
        });

        // get size list
        elem_produk.addEventListener('change', (e)=>{
            // document.getElementById('mal-loading-overlay').style.display = 'flex';
            let idProdukDipilih = elem_produk.value;
            // console.log('id produk ='+idProdukDipilih);

            fetch('/kartu_stok/get_produk_size', {
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": token
                    },
                method: "POST", 
                credentials: "same-origin",
                body: idProdukDipilih
            })
            .then(response => response.json())
            .then(size => {
                    // console.log(size);

                    elem_size.innerHTML = '';
                    size.forEach(element => {
                        elem_size.innerHTML += 
                        '<option value="'+element.id+'">'+element.size+'</option>'             
                    });

                })
            .catch(function(error) {
                console.log(error);
            });
        })
    </script>

@endsection