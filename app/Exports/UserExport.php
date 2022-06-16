<?php

namespace App\Exports;

use App\Models\OrderDetail;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    private $id_order;

    public function __construct(int $id_order){
        $this->id_order = $id_order;
    }

    public function collection()
    {
        // return User::all();
        // dd(User::get_alamat());
        // dd(OrderDetail::get_order_detail_item_id(23));
        // return OrderDetail::get_order_detail_item_id(29);
        return OrderDetail::get_order_per_item($this->id_order);
    }
}