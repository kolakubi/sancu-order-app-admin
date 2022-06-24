<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class notification extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function get_kartu_stok(){
        return $data_stok = DB::table('kartu_stoks')
            ->select('*', 'kartu_stoks.id as kartu_stoks_id')
            ->join('produk_details', 'kartu_stoks.id_produk_detail', '=', 'produk_details.id')
            ->join('produks', 'produk_details.id_produk', '=', 'produks.id')
            ->join('categories', 'produks.id_category', '=', 'categories.id')
            ->orderBy('kartu_stoks.id', 'desc')
            ->get();
    }

    public static function get_notif_detail_admin(){
        return $notification = DB::table('notifications')
            ->select('notifications.id', 'users.name', 'notifications.tipe', 'notifications.id_order', 'notifications.trash', 'notifications.content', 'notifications.dilihat', 'notifications.created_at as waktu_notif')
            ->where('notifications.id_user', 'admin')
            ->join('orders', 'notifications.id_order', '=', 'orders.id')
            ->join('users', 'orders.id_user', '=', 'users.id')
            ->orderBy('orders.id', 'desc')
            ->get();
    }
}