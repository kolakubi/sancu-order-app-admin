<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserExport;

class OrderDetailController extends Controller
{
    public function export_excel(){
        return Excel::download(new UserExport, 'datauser.xlsx');
    }
}
