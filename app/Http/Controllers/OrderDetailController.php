<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserExport;
use App\Models\Order;

class OrderDetailController extends Controller
{
    public function export_excel(){
        return Excel::download(new UserExport, 'datauser.xlsx');
    }

    public function print_resi($id){

        $agenName = Order::get_agen_name($id);
        $dataSancu = Order::get_category_order($id, 1);
        $dataBoncu = Order::get_category_order($id, 2);
        $dataPretty = Order::get_category_order($id, 3);
        $dataXtreme = Order::get_category_order($id, 4);
        $dataCoupon = Order::get_coupon_info($id);
        // dd($agenName);

        return view('print_resi_pengiriman', [
            'title' => 'Resi pengiriman',
            'agen' => $agenName[0],
            'id_order' => $id,
            'ongkir' => $agenName[0]->ongkir,
            'data_sancu' => $dataSancu,
            'data_boncu' => $dataBoncu,
            'data_pretty' => $dataPretty,
            'data_xtreme' => $dataXtreme,
            'coupon' => $dataCoupon
        ]);
    }
}
