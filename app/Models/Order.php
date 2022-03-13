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

}
