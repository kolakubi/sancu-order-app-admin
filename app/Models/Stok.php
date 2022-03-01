<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Stok extends Model
{
    use HasFactory;

    public static function get_all(){
        // return $data = DB::table('produks')
        //     ->select('*', 'produk_details.id as id_item_detail')
        //     ->join('produk_details', 'produks.id', '=', 'produk_details.id_produk')
        //     ->join('categories', 'produks.id_category', '=', 'categories.id')
        //     ->get();

        return $data = DB::table('produks')
            ->select('*', 'produks.id as produk_id')
            ->join('categories', 'produks.id_category', '=', 'categories.id')
            ->get();
    }

    public static function get_stok($id){
        return $data = DB::table('produks')
            ->select('*', 'produk_details.id as id_item_detail')
            ->join('produk_details', 'produks.id', '=', 'produk_details.id_produk')
            ->join('categories', 'produks.id_category', '=', 'categories.id')
            ->where('produks.id', $id)
            ->get();
    }

    public static function get_all_produk_detail(){
        return $data = DB::table('produks')
            ->select('*', 'produk_details.id as id_item_detail')
            ->join('produk_details', 'produks.id', '=', 'produk_details.id_produk')
            ->join('categories', 'produks.id_category', '=', 'categories.id')
            ->get();
    }
}
