<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show(){
        $dataOrder = Order::get_all();
        // dd($dataOrder);

        return view('orders', [
            'title' => 'orders',
            'orders' => $dataOrder
        ]);
    }

    public function show_detail($id){
        // dd($id);
        $agenName = Order::get_agen_name($id);
        $dataSancu = Order::get_category_order($id, 1);
        $dataBoncu = Order::get_category_order($id, 2);
        $dataPretty = Order::get_category_order($id, 3);
        $dataXtreme = Order::get_category_order($id, 4);
        $dataCoupon = Order::get_coupon_info($id);

        return view('order_details', [
            'title' => 'order detail',
            'agen' => $agenName[0]->name,
            'id_order' => $id,
            'ongkir' => $agenName[0]->ongkir,
            'data_sancu' => $dataSancu,
            'data_boncu' => $dataBoncu,
            'data_pretty' => $dataPretty,
            'data_xtreme' => $dataXtreme,
            'coupon' => $dataCoupon
        ]);
    }

    public function update_ongkir(Request $orders){
        // get status order
        $status = Order::where('id', $orders->orders_id)->first()->status;

        // jika status 1
        // atau 'menunggu ongkir'
        // update menjadi 2 atau 'proses'
        if($status < 2){
            Order::where('id', $orders->orders_id)
            ->update(
                [
                    'ongkir' => $orders->ongkir,
                    'status' => 2
                ]
            );
        }
        // jika status sdh 2 atau lebih
        // tidak perlu update status
        else{
            Order::where('id', $orders->orders_id)
            ->update(
                ['ongkir' => $orders->ongkir]
            );
        }
    } // end of function update_ongkir

}
