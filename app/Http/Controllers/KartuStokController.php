<?php

namespace App\Http\Controllers;
use App\Models\Kartu_stok;
use App\Models\Produk;
use App\Models\Produk_detail;

use Illuminate\Http\Request;

class KartuStokController extends Controller
{
    //
    public function kartu_stok_show(){
        $kartu_stok = [];
        // dd($kartu_stok);

        return view('kartu_stok', [
            'title' => "Kartu Stok",
            'kartu_stok' => $kartu_stok
        ]);
    }

    public function kartu_stok_show_data(Request $request){
        $data_stok = Kartu_stok::get_kartu_stok_by_produk($request->id_produk_detail);

        return view('kartu_stok', [
            'title' => "Kartu Stok",
            'kartu_stok' => $data_stok
        ]);
    }

    public function get_produk(){
        $data_produk = Produk::orderBy('nama_produk')
            ->get();
        return $data_produk;
    }

    public function get_produk_size(Request $request){
        $data_size = Kartu_stok::get_produk_size($request[0]);
        return $data_size;
    }
}
