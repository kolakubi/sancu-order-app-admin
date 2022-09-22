<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Config;
use App\Models\Kartu_stok;
use App\Models\Whatsapp;
use App\Models\Notification;
use Illuminate\Http\Request;
use DateTime;

class OrderController extends Controller
{
    private $client_host;

    public function __construct(){
        $this->client_host=Config::where('nama', 'client_host')->get()[0]->nilai.'storage/';
    }

    public function show(){
        $dataOrder = Order::get_all();
        $whatsapps = Whatsapp::all();
        // dd($dataOrder);

        return view('orders', [
            'title' => 'orders',
            'orders' => $dataOrder,
            'whatsapps' => $whatsapps
        ]);
    }

    public function show_detail($id){
        $agenName = Order::get_agen_name($id);
        $dataCoupon = Order::get_coupon_info($id);
        $dataAlamat = Order::get_alamat_kirim($id);
        $orders = Order::get_detail_by_id($id);
        $tgl_order = Order::where('id', $id)->first()->created_at;
        $tgl_sekarang = new DateTime();
        $selisih_hari = $tgl_sekarang->diff($tgl_order)->format('%a');
        // dd($dataAlamat);

        return view('order_details', [
            'title' => 'order detail',
            'agen' => $agenName[0],
            'id_order' => $id,
            'ongkir' => $agenName[0]->ongkir,
            'coupon' => $dataCoupon,
            'client_host' => $this->client_host,
            'alamat' => $dataAlamat,
            'orders' => $orders,
            'tgl_order' => $tgl_order,
            'selisih_hari' => $selisih_hari
        ]);
    }

    public function update_ongkir(Request $orders){
        $this->validate($orders, [
            'ongkir' => 'required|numeric|gt:0',
            'ekspedisi' => 'required'
        ]);

        // get status order
        $status = Order::where('id', $orders->orders_id)->first()->status;
        // jika status 1
        // atau 'menunggu ongkir'
        // update menjadi 2 atau 'proses'
        if($status < 2){
            Order::where('id', $orders->orders_id)
            ->update(
                [
                    'ongkir' => $orders->ongkir,
                    'ekspedisi' => $orders->ekspedisi,
                    'status' => 2
                ]
            );
        }
        // jika status sdh 2 atau lebih
        // tidak perlu update status
        else{
            Order::where('id', $orders->orders_id)
            ->update(
                [
                    'ongkir' => $orders->ongkir,
                    'ekspedisi' => $orders->ekspedisi
                ]
            );
        }

        Notification::create([
            'id_user' => $orders->user_id,
            'id_order' => $orders->orders_id,
            'tipe' => 3,
            'content' => 'Pesanan di Proses',
            'dilihat' => 0,
            'trash' => 0
        ]);

        return redirect()->back()->with('add_berhasil', 'Data ongkir berhasil diinput');
    } // end of function update_ongkir

    public function update_potongan_harga_langsung(Request $request){
        $this->validate($request, [
            'potongan_harga_langsung' => 'required|numeric|gt:0',
        ]);
        Order::where('id', $request->orders_id)
            ->update(
                [
                    'potongan_harga_langsung' => $request->potongan_harga_langsung,
                    'keterangan_potongan_harga_langsung' => $request->keterangan_potongan_harga_langsung
                ]
            );
        return redirect()->back()->with('add_berhasil', 'Data berhasil diinput');
    }

    public function update_penambahan_harga_langsung(Request $request){
        $this->validate($request, [
            'penambahan_harga_langsung' => 'required|numeric|gt:0',
        ]);
        Order::where('id', $request->orders_id)
            ->update(
                [
                    'penambahan_harga_langsung' => $request->penambahan_harga_langsung,
                    'keterangan_penambahan_harga_langsung' => $request->keterangan_penambahan_harga_langsung
                ]
            );
        return redirect()->back()->with('add_berhasil', 'Data berhasil diinput');
    }

    public function update_keterangan_packing(Request $request){
        $this->validate($request, [
            'keterangan_packing' => 'required',
        ]);
        Order::where('id', $request->orders_id)
            ->update(
                [
                    'keterangan_packing' => $request->keterangan_packing,
                ]
            );
        return redirect()->back()->with('add_berhasil', 'Data berhasil diinput');
    }

    public function update_resi(Request $request){
        // ddd($request);

        $validateData = $request->validate([
            'file_resi' => 'image|file|max:2048'
        ]);

        // upload
        $file_path = $request->file('file_resi')->store('resi');

        // update DB
        Order::where('id', $request->orders_id)
            ->update([
                'resi'=> $file_path,
                'status' => 4
            ]);

        Notification::create([
            'id_user' => $request->user_id,
            'id_order' => $request->orders_id,
            'tipe' => 4,
            'content' => 'Pesanan telah dikirim',
            'dilihat' => 0,
            'trash' => 0
        ]);

        return redirect()->back()->with('add_berhasil', 'Foto resi berhasil diinput');
    }

    public function order_batal(Request $request){

        $id_order = $request[0];
        // update status order
        // jadi 0
        Order::where('id', $id_order)
            ->update([
                'status' => 0
            ]);
        // ambil detail produk
        $detail_item = Order::get_order_item_detail($id_order);
        // update kartu stok
        foreach($detail_item as $item){

            // update kartu stok
            // ambil saldo stok terakhir
            $data_saldo_terakhir = Kartu_stok::get_saldo_terakhir_kartu_stok($item->id_produk_detail);

            Kartu_stok::create([
                'id_produk_detail' => $item->id_produk_detail,
                'status' => 'in',
                'jumlah' => $item->jumlah_produk,
                'keterangan' => 'pembatalan order agen no #'.$item->id_order,
                'saldo' => $data_saldo_terakhir + (int)$item->jumlah_produk
            ]);

            // update stok items
            // tambah
            Order_detail::Update_stok_tambah($item);
        }

        return response()->json([
            'status' => '200',
            'detail' => 'success',
        ]);
    }

    public function edit_alamat_dropship(Request $req){
        // dd($req->orders_id);
        $this->validate($req, [
            'orders_id' => 'required', 
            'nama_dropship' => 'required',
            'telepon_dropship' => 'required',
            'alamat_dropship' => 'required',
        ]);

        Order::where('id', $req->orders_id)
            ->update([
                'dropship_nama' => $req->nama_dropship,
                'dropship_telepon' => $req->telepon_dropship,
                'dropship_alamat' => $req->alamat_dropship
            ]);

        return redirect('/orders/'.$req->orders_id);

        // return response()->json([
        //     'status' => '200',
        //     'detail' => 'success',
        // ]);

    }

}
