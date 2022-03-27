<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    //
    public function show(){
        $item_sancu = 0;
        $item_boncu = 0;
        $item_pretty = 0;
        $item_xtreme = 0;
        $item_lainnya = 0;
        $uang_penjualan = 0;
        $total_order = 0;

        return view('penjualan', [
            'title' => 'Penjualan',
            'item_sancu' => $item_sancu,
            'item_boncu' => $item_boncu,
            'item_pretty' => $item_pretty,
            'item_xtreme' => $item_xtreme,
            'item_lainnya' => $item_lainnya,
            'uang_penjualan' => $uang_penjualan,
            'total_order' => $total_order,
        ]);
    }

    public function get_data_penjualan(Request $request){
        $item_sancu = 0;
        $item_boncu = 0;
        $item_pretty = 0;
        $item_xtreme = 0;
        $item_lainnya = 0;
        $uang_penjualan = 0;
        $total_order = 0;

        $data_penjualan = Order::get_penjualan_by_date($request->tanggaldari, $request->tanggalsampai);
        foreach($data_penjualan as $penjualan){
            // uang penjualan
            $uang_penjualan += ($penjualan->harga_produk*$penjualan->jumlah_produk);
            // penjualan per item
            if($penjualan->id_category == 1){
                $item_sancu += $penjualan->jumlah_produk;
            }
            elseif($penjualan->id_category == 2){
                $item_boncu += $penjualan->jumlah_produk;
            }
            elseif($penjualan->id_category == 3){
                $item_pretty += $penjualan->jumlah_produk;
            }
            elseif($penjualan->id_category == 4){
                $item_xtreme += $penjualan->jumlah_produk;
            }
            else{
                $item_lainnya += $penjualan->jumlah_produk;
            }
        }

        // data order
        $data_order = Order::whereBetween('created_at', [$request->tanggaldari, $request->tanggalsampai])->get();
        $total_order = count($data_order);
        return view('penjualan', [
            'title' => 'Penjualan',
            'item_sancu' => $item_sancu,
            'item_boncu' => $item_boncu,
            'item_pretty' => $item_pretty,
            'item_xtreme' => $item_xtreme,
            'item_lainnya' => $item_lainnya,
            'uang_penjualan' => $uang_penjualan,
            'total_order' => $total_order,
        ]);

    }
}
