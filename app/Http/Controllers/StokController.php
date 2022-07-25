<?php

namespace App\Http\Controllers;
use App\Models\Stok;
use App\Models\Produk;
use App\Models\Produk_detail;
use App\Models\Category;
use App\Models\Kartu_stok;
use App\Models\Log_item;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StokImport;

class StokController extends Controller
{
    public function show(){
        $data_stok = Stok::get_all();
        return view('update_item', [
            'title' => 'Update Item',
            'stoks' => $data_stok
        ]);
    }

    public function show_item(){
        $data_item = Stok::get_all();
        return view('item', [
            'title' => 'Item',
            'items' => $data_item
        ]);
    }

    public function show_tambah_item(){
        $categories = Category::all();
        return view('tambah_item', [
            'title' => 'Tambah Item',
            'categories' => $categories
        ]);
    }

    public function show_tambah_item_pelengkap(){
        $categories = Category::all();
        return view('tambah_item_pelengkap', [
            'title' => 'Tambah Item Pelengkap',
            'categories' => $categories
        ]);
    }

    public function add_tambah_item(Request $request){
        // isi detail_data
        // [
        //     0: {size: '21', stok: '100', harga: '12000'}
        //     1: {size: '24', stok: '100', harga: '12000'}
        // ]
        $this->validate($request, [
            'nama_produk' => 'required|max:255',
            'kategori' => 'required|max:255',
            'file' => 'required|image',
            'detail_data' => 'required'
        ]);
        // return json_decode($request->detail_data);
        $produk_details = json_decode($request->detail_data);
        if(count($produk_details) < 1){
            return json_encode(['status'=> 400, 'error' => 'tidak ada varian']); 
        }

        // upload gambar
        $file_path = $request->file('file')->store('produk/thumbnail');
        $id_produk = rand(1000, 9999);

        // add produk
        Produk::create([
            'id' => $id_produk,
            'nama_produk' => $request->nama_produk,
            'gambar_url_produk' => $file_path,
            'id_category' => $request->kategori
        ]);

        foreach($produk_details as $produk_detail){
            $id_produk_detail = $id_produk.''.$produk_detail->size;

            // add produk_details
            Produk_detail::create([
                'id' => $id_produk_detail,
                'id_produk' => $id_produk,
                'size' => $produk_detail->size,
                'jumlah_stok' => $produk_detail->stok,
                'harga_produk' => $produk_detail->harga,
                'berat' => $produk_detail->berat
            ]);

            // add kartu_stoks
            Kartu_stok::create([
                'id_produk_detail' => $id_produk_detail,
                'status' => 'in',
                'jumlah' => $produk_detail->stok,
                'keterangan' => 'input produk awal',
                'saldo' => $produk_detail->stok
            ]);
        }
        // jika berhasil semua
        return json_encode(['status'=> 200]);
    }

    public function import_stok_show(){
        return view('import_stok', [
            'title' => 'Import Stok'
        ]);
    }

    public function import_stok_save(Request $request){
        // dd($request->file('excel'));
        Excel::import(new StokImport, $request->file('file-import'));
        return redirect()->back();
    }

    public function show_update_item($id){
        // ambil stok berdasarkan id
        $data_stok = Stok::get_stok($id);
        // dd($data_stok);
        return view('update_item_detail', [
            'title' => 'Edit Item Detail',
            'data_stok' => $data_stok
        ]);
    }

    public function update_edit_item(Request $request){
        // format data yg diterima
        // {
        //     "id":"1",
        //     "nama_produk":"Sancu Dolphin",
        //     "stok":
        //         [
        //             {"id_produk_detail":"1","stok":"0"},
        //             {"id_produk_detail":"2","stok":"45"},
        //             {"id_produk_detail":"3","stok":"40"}
        //         ],
        //     "harga":
        //         [
        //             {"id_produk_detail":"1","harga":"16000"},
        //             {"id_produk_detail":"2","harga":"16000"},
        //             {"id_produk_detail":"3","harga":"17000"}
        //         ]
        // }
        // return $request->nama_produk;
        // update attribut lain
        Produk::where('id', $request->id)
            ->update([
                'nama_produk' => $request->nama_produk
            ]);

        // update stok
        foreach($request->stok as $stok){
            Produk_detail::where('id', $stok['id_produk_detail'])
                ->update(['jumlah_stok' => $stok['stok']]);
        }

        // update harga
        foreach($request->harga as $harga){
            // ambil harga sebelumnya
            $harga_saat_ini = Produk_detail::where('id', $harga['id_produk_detail'])->first()->harga_produk;
            // jika ada perubahan
            // simpan ke log_items
            if($harga_saat_ini != $harga['harga']){
                Log_item::create([
                    'id_produk_detail' => $harga['id_produk_detail'],
                    'keterangan'=> 'perubahan harga dari '.$harga_saat_ini.' menjadi -> '.$harga['harga']
                ]);
            }

            Produk_detail::where('id', $harga['id_produk_detail'])
                ->update(['harga_produk' => $harga['harga']]);
        }

        // update berat
        foreach($request->berat as $berat){
            Produk_detail::where('id', $berat['id_produk_detail'])
                ->update(['berat' => $berat['berat']]);
        }
        
        // jika berhasil semua
        return json_encode(['status'=> 200]);
    }

    public function stok_masuk_show(){
        $items = Stok::get_all();
        return view('stok_masuk', [
            'title' => 'Stok Masuk',
            'items' => $items
        ]);
    }

    public function stok_masuk_add_show($id){
        // ambil stok berdasarkan id
        $data_stok = Stok::get_stok($id);
        // dd($data_stok);
        return view('stok_masuk_add', [
            'title' => 'Stok Masuk Add',
            'data_stok' => $data_stok
        ]);
    }

    public function stok_masuk_add(Request $request){
        // dd($request->stok_masuk);
        // update stok
        foreach($request->total_stok as $total_stok){
            // update stok
            Produk_detail::where('id', $total_stok['id_produk_detail'])
                ->update(['jumlah_stok' => $total_stok['stok']]);
        }

        // simpan ke kartu stok
        // jika data stok masuk > 0
        foreach($request->stok_masuk as $stok_masuk){
            if($stok_masuk['stok'] > 0){
                // update kartu stok
                // ambil saldo stok terakhir
                $data_saldo_terakhir = Kartu_stok::get_saldo_terakhir_kartu_stok($stok_masuk['id_produk_detail']);

                Kartu_stok::create([
                    'id_produk_detail' => $stok_masuk['id_produk_detail'],
                    'status' => 'in',
                    'jumlah' => (int)$stok_masuk['stok'],
                    'keterangan' => 'penambahan stok manual '.$request->keterangan,
                    'saldo' => (int)$stok_masuk['stok'] + $data_saldo_terakhir
                ]);
            }
        }
        // jika berhasil semua
        return json_encode(['status'=> 200]);
    }

    public function stok_keluar_show(){
        $items = Stok::get_all();
        return view('stok_keluar', [
            'title' => 'Stok Keluar',
            'items' => $items
        ]);
    }

    public function stok_keluar_add_show($id){
        // ambil stok berdasarkan id
        $data_stok = Stok::get_stok($id);
        // dd($data_stok);
        return view('stok_keluar_add', [
            'title' => 'Stok Keluar Add',
            'data_stok' => $data_stok
        ]);
    }

    public function stok_keluar_add(Request $request){
        // dd($request->stok_masuk);
        // update stok
        foreach($request->total_stok as $total_stok){
            Produk_detail::where('id', $total_stok['id_produk_detail'])
                ->update(['jumlah_stok' => $total_stok['stok']]);
        }

        // simpan ke kartu stok
        // jika data stok masuk > 0
        foreach($request->stok_keluar as $stok_keluar){
            if($stok_keluar['stok'] > 0){
                $data_saldo_terakhir = Kartu_stok::get_saldo_terakhir_kartu_stok($stok_keluar['id_produk_detail']);

                Kartu_stok::create([
                    'id_produk_detail' => $stok_keluar['id_produk_detail'],
                    'status' => 'out',
                    'jumlah' => (int)$stok_keluar['stok'],
                    'keterangan' => 'rusak / hilang '.$request->keterangan,
                    'saldo' => $data_saldo_terakhir - (int)$stok_keluar['stok']
                ]);
            }
        }
        // jika berhasil semua
        return json_encode(['status'=> 200]);
    }
}
