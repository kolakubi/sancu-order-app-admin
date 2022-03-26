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

    public function print_detail_packing($id){

        $agenName = Order::get_agen_name($id);
        $dataAlamat = Order::get_alamat_kirim($id);
        $orders = Order::get_detail_by_id($id);
        // dd($dataAlamat);

        return view('print_detail_packing', [
            'title' => 'Resi pengiriman',
            'agen' => $agenName[0],
            'id_order' => $id,
            'alamat' => $dataAlamat,
            'orders' => $orders
        ]);
    }
}
