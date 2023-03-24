<?php

namespace App\Http\Controllers;
use App\Models\Produk;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function hapus_produk(Request $request){
        $id_produk = $request[0];
        // update status archive
        // jadi yes
        Produk::where('id', $id_produk)
            ->update([
                'archive' => 'yes'
            ]);

        return response()->json([
            'status' => '200',
            'detail' => 'success',
        ]);
    }

    public function tampilkan_produk(Request $request){
        $id_produk = $request[0];
        // update status archive
        // jadi yes
        Produk::where('id', $id_produk)
            ->update([
                'archive' => 'no'
            ]);

        return response()->json([
            'status' => '200',
            'detail' => 'success',
        ]);
    }
}
