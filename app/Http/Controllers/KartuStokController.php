<?php

namespace App\Http\Controllers;
use App\Models\Kartu_stok;

use Illuminate\Http\Request;

class KartuStokController extends Controller
{
    //
    public function kartu_stok_show(){
        $kartu_stok = Kartu_stok::get_kartu_stok();
        // dd($kartu_stok);

        return view('kartu_stok', [
            'title' => "Kartu Stok",
            'kartu_stok' => $kartu_stok
        ]);
    }
}
