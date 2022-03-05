<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    //
    public function show(){
        $data_coupon = Coupon::all();

        return view('coupon', [
            'title' => 'Coupon',
            'coupons' => $data_coupon
        ]);
    }

    public function add_coupon_show(){
        return view('coupon_add', [
            'title' => 'Add Coupon'
        ]);
    }

    public function add_coupon_create(Request $request){
        // dd($request);
        // tanggal selesai harus lebih besar
        // dari tanggal sekarang
        $date_now = date('Y-m-d');
        if($request->tanggal_sampai < $date_now){
            return redirect('/coupon/add')->with('date_error', 'Tanggal berakhir harus melewati tanggal sekarang');
        }

        // cek apakah kode kupon sudah digunakan
        $cek_kode_coupon = Coupon::where('name', $request->kode_coupon)->get();
        if(count($cek_kode_coupon) > 0){
            return redirect('/coupon/add')->with('kode_coupon_error', 'Kode coupon sudah digunakan, ganti kode lain');
        }

        // add coupon
        Coupon::create([
            'name' => $request->kode_coupon,
            'keterangan' => $request->keterangan,
            'potongan' => $request->potongan,
            'masa_mulai' => $request->tanggal_dari,
            'masa_aktif' => $request->tanggal_sampai,
            'tipe' =>$request->tipe_coupon
        ]);

        return redirect('/coupon')->with('add_berhasil', 'Data coupon berhasil ditambah');
    }
}
