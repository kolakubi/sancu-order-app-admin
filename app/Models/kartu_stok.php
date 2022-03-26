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
        return $dataOrder = DB::table('kartu_stoks')
            ->select('*', 'kartu_stoks.id as kartu_stoks_id')
            ->join('produk_details', 'kartu_stoks.id_produk_detail', '=', 'produk_details.id')
            ->join('produks', 'produk_details.id_produk', '=', 'produks.id')
            ->join('categories', 'produks.id_category', '=', 'categories.id')
            ->orderBy('kartu_stoks.id', 'desc')
            ->get();
    }
}
