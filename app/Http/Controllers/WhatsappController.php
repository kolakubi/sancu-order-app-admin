<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Whatsapp;

class WhatsappController extends Controller
{
    //
    public function show(){
        $whatsapps = Whatsapp::all();

        return view('whatsapp', [
            'title' => 'Whatsapp',
            'whatsapps' => $whatsapps
        ]);
    }

    public function update(Request $request){
        // dd($request);
        $this->validate($request, [
            '0' => 'required',
            '1' => 'required',
            '2' => 'required',
            '3' => 'required',
            '4' => 'required',
            '5' => 'required',
        ]);

        foreach($request->request as $key=>$req){
            // return $key;
            if($key != '_token'){
                // return $req;
                Whatsapp::where('id', $key)
                ->update(['text' => $req]);
            }
        }
        return redirect('/whatsapp')->with('update_berhasil', 'Data berhasil diupdate');
    }
}
