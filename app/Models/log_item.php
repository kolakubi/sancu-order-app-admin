<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class log_item extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function get_all(){
        return $data_log = DB::table('log_items')
            ->select('*')
            ->join('produk_details', 'log_items.id_produk_detail', '=', 'produk_details.id')
            ->join('produks', 'produk_details.id_produk', '=', 'produks.id')
            ->join('categories', 'produks.id_category', '=', 'categories.id')
            ->orderBy('log_items.id', 'desc')
            ->get();
    }
}
