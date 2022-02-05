<?php

namespace App\Exports;

use App\Models\OrderDetail;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return User::all();
        // dd(User::get_alamat());
        // dd(OrderDetail::get_order_detail_item_id(23));
        return OrderDetail::get_order_detail_item_id(29);
    }
}