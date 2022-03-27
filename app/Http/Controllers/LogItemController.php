<?php

namespace App\Http\Controllers;
use App\Models\Log_item;

use Illuminate\Http\Request;

class LogItemController extends Controller
{
    //
    public function show(){
        $data_log = Log_item::get_all();

        return view('log_item', [
            'title' => 'Log Item',
            'data_log' => $data_log
        ]);
    }
}
