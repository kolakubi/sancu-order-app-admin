@extends('main')

@section('content')

    <div class="section-header">
        <h1>Item</h1>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <a class="btn btn-info" href="{{route('tambah_item')}}">Tambah Item Sandal +</a>
            <a class="btn btn-warning" href="{{route('tambah_item_pelengkap')}}">Tambah Item Pelengkap +</a>
        </div>
    </div>

    <table class="table" id="my_datatable">
        <thead>
            <tr>
                {{-- <th>No</th> --}}
                <th>Id Item</th>
                <th>Nama</th>
                <th>Merk</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($items as $item)
            <tr>
                {{-- <td>{{$loop->iteration}}</td> --}}
                <td>{{$item->produk_id}}</td>
                <td>{{$item->nama_produk}}</td>
                <td>{{$item->nama_category}}</td>
                <td>
                    <a href="/update_item/edit/{{$item->produk_id}}" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                      </svg>
                    </a>
                    @if($item->archive == 'no')
                        <a href="#" class="btn btn-danger" data-idproduk="{{$item->produk_id}}" onclick="archive_yes(this)">
                            <i class="bi bi-trash"></i>
                        </a>
                    @else
                        <a href="#" class="btn btn-warning" data-idproduk="{{$item->produk_id}}" onclick="archive_no(this)">
                            <i class="bi bi-trash2"></i>
                        </a>
                    @endif
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>

    <script src="/assets/sweet-alert/sweetalert2.all.min.js"></script>
    <script>
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        function archive_yes(elem){

            elem.preventDevault;
            const idProduk = elem.dataset.idproduk;

            Swal.fire({
                icon: 'question',
                title: 'Yakin ingin menghapus produk ini',
                showDenyButton: true,
                confirmButtonText: 'Ya',
                denyButtonText: `Tidak`,
            }).then((result) => {
                if (result.isConfirmed) {
                    // ajax ke pengecekan stok
                    fetch("/produk/hapus", {
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json, text-plain, */*",
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-TOKEN": token
                            },
                        method: "POST", 
                        credentials: "same-origin",
                        body: idProduk
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

        function archive_no(elem){

            elem.preventDevault;
            const idProduk = elem.dataset.idproduk;

            Swal.fire({
                icon: 'question',
                title: 'Yakin ingin menampilkan produk ini',
                showDenyButton: true,
                confirmButtonText: 'Ya',
                denyButtonText: `Tidak`,
            }).then((result) => {
                if (result.isConfirmed) {
                    // ajax ke pengecekan stok
                    fetch("/produk/tampilkan", {
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json, text-plain, */*",
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-TOKEN": token
                            },
                        method: "POST", 
                        credentials: "same-origin",
                        body: idProduk
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

