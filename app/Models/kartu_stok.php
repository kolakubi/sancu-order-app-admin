<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class kartu_stok extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function get_kartu_stok(){
        return $data_stok = DB::table('kartu_stoks')
            ->select('*', 'kartu_stoks.id as kartu_stoks_id')
            ->join('produk_details', 'kartu_stoks.id_produk_detail', '=', 'produk_details.id')
            ->join('produks', 'produk_details.id_produk', '=', 'produks.id')
            ->join('categories', 'produks.id_category', '=', 'categories.id')
            ->orderBy('kartu_stoks.id', 'desc')
            ->get();
    }

    public function get_kartu_stok_by_produk($id_produk_detail){
        return $data_stok = DB::table('kartu_stoks')
            ->select('*', 'kartu_stoks.id as kartu_stoks_id', 'kartu_stoks.created_at as kartu_stok_tanggal')
            ->where('kartu_stoks.id_produk_detail', $id_produk_detail)
            ->join('produk_details', 'kartu_stoks.id_produk_detail', '=', 'produk_details.id')
            ->join('produks', 'produk_details.id_produk', '=', 'produks.id')
            ->orderBy('kartu_stoks.created_at', 'DESC')
            ->get();
    }

    public static function get_saldo_terakhir_kartu_stok($id_item_detail){
        return $data = DB::table('kartu_stoks')
            ->select('*')
            ->where('id_produk_detail', $id_item_detail)
            ->latest('created_at')
            ->first()->saldo;
    }

    public static function get_produk_size($id){
        return $data = DB::table('produk_details')
            ->select('*')
            ->where('id_produk', $id)
            ->get();
    }
}
