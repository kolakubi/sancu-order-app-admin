<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order_detail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function Update_stok_tambah($item){
        // ambil stok saat ini
        $stok_sekarang = DB::table('produk_details')
            ->where('id', $item->id_produk_detail)
            ->first()->jumlah_stok;
        // kurangin stok yg dibeli
        $stok_baru = $stok_sekarang+$item->jumlah_produk;

        return DB::table('produk_details')
            ->where('id', $item->id_produk_detail)
            ->update(['jumlah_stok' => $stok_baru]);
    }
}
