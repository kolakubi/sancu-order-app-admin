<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    public function get_all(){
        return $dataOrder = DB::table('orders')
            ->select('*', 'orders.id as orders_id')
            ->join('users', 'orders.id_user', '=', 'users.id')
            ->join('status_pesanan', 'orders.status', '=', 'status_pesanan.id')
            ->orderBy('orders.id', 'desc')
            ->get();
    }

    public function get_category_order($id, $category){
        return $data = DB::table('order_details')
            ->select('*')
            ->join('produk_details', 'order_details.id_produk_detail', '=', 'produk_details.id')
            ->join('produks', 'produk_details.id_produk', '=', 'produks.id')
            ->where('order_details.id_order', $id)
            ->where('produks.id_category', $category)
            ->get();
    }

    public function get_detail_by_id($id){
        return $data = DB::table('order_details')
            ->select('*')
            ->join('produk_details', 'order_details.id_produk_detail', '=', 'produk_details.id')
            ->join('produks', 'produk_details.id_produk', '=', 'produks.id')
            ->join('categories', 'produks.id_category', '=', 'categories.id')
            ->where('order_details.id_order', $id)
            ->orderBy('produks.id_category')
            ->get();
    }

    public function get_agen_name($id){
        return $data = DB::table('orders')
            ->select('*')
            ->join('users', 'orders.id_user', '=', 'users.id')
            ->where('orders.id', $id)
            ->get();
    }

    public function get_coupon_info($id){
        return $data = DB::table('orders')
            ->select('*')
            ->join('coupons', 'orders.coupon', '=', 'coupons.name')
            ->where('orders.id', $id)
            ->first();
    }

    public function get_alamat_kirim($id){
        return $data = DB::table('orders')
            ->select('*')
            ->join('alamats', 'orders.id_alamat', '=', 'alamats.id')
            ->where('orders.id', $id)
            ->first();
    }

    public static function get_order_item_detail($id_order){
        return $dataItem = DB::table('orders')
            ->select('*', 'orders.id as id_order', 'orders.created_at as tgl_order')
            ->where('id_order', $id_order)
            ->join('order_details', 'orders.id', '=', 'order_details.id_order')
            ->join('produk_details', 'order_details.id_produk_detail', '=', 'produk_details.id')
            ->join('produks', 'produk_details.id_produk', '=', 'produks.id')
            ->orderBy('produks.id')
            ->orderBy('produk_details.size', 'DESC')
            ->get();
    }

    public function get_penjualan_by_date($tanggal_dari, $tanggal_sampai){
        return $data = DB::table('orders')
            ->select('*')
            ->join('order_details', 'order_details.id_order', '=', 'orders.id')
            ->join('produk_details', 'order_details.id_produk_detail', '=', 'produk_details.id')
            ->join('produks', 'produk_details.id_produk', '=', 'produks.id')
            ->whereDate('orders.created_at', '>=', $tanggal_dari)
            ->whereDate('orders.created_at', '<=', $tanggal_sampai)
            ->get();
    }

    public function get_penjualan_by_date_and_db($tanggal_dari, $tanggal_sampai, $id){
        return $data = DB::table('orders')
            ->select('*')
            ->join('order_details', 'order_details.id_order', '=', 'orders.id')
            ->join('produk_details', 'order_details.id_produk_detail', '=', 'produk_details.id')
            ->join('produks', 'produk_details.id_produk', '=', 'produks.id')
            ->join('users', 'orders.id_user', '=', 'users.id')
            ->where('users.id', $id)
            ->where('orders.status', 5) // order sdh selesai
            ->whereDate('orders.created_at', '>=', $tanggal_dari)
            ->whereDate('orders.created_at', '<=', $tanggal_sampai)
            ->get();
    }

    public function get_penjualan_today($tanggal){
        return $data = DB::table('orders')
            ->select('*')
            ->join('order_details', 'order_details.id_order', '=', 'orders.id')
            ->join('produk_details', 'order_details.id_produk_detail', '=', 'produk_details.id')
            ->join('produks', 'produk_details.id_produk', '=', 'produks.id')
            ->whereDate('orders.created_at', '>=', $tanggal)
            ->get();
    }

}
