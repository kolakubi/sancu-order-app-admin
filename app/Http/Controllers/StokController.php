<?php

namespace App\Http\Controllers;
use App\Models\Stok;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StokImport;

class StokController extends Controller
{
    public function show(){
        $data_stok = Stok::get_all();
        // dd($data_stok);

        return view('stok', [
            'title' => 'Stok',
            'stoks' => $data_stok
        ]);
    }

    public function show_item(){
        $data_item = Stok::get_all_produk_detail();
        // dd($data_item);

        return view('item', [
            'title' => 'Item',
            'items' => $data_item
        ]);
    }

    public function import_stok_show(){
        return view('import_stok', [
            'title' => 'Import Stok'
        ]);
    }

    public function import_stok_save(Request $request){
        // dd($request->file('excel'));
        Excel::import(new StokImport, $request->file('file-import'));

        return redirect()->back();
    }

    public function show_edit_stok($id){
        // ambil stok berdasarkan id
        $data_stok = Stok::get_stok($id);
        // dd($data_stok);

        return view('edit_stok', [
            'title' => 'Edit stok',
            'data_stok' => $data_stok
        ]);
    }
}
