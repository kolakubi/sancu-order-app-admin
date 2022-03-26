<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Config;
use App\Models\Kartu_stok;
use App\Models\Whatsapp;
use Illuminate\Http\Request;

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
        // dd($orders);

        return view('order_details', [
            'title' => 'order detail',
            'agen' => $agenName[0],
            'id_order' => $id,
            'ongkir' => $agenName[0]->ongkir,
            'coupon' => $dataCoupon,
            'client_host' => $this->client_host,
            'alamat' => $dataAlamat,
            'orders' => $orders
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
        return redirect()->back();
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
        return redirect()->back();
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

        return redirect('/orders');
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
            Kartu_stok::create([
                'id_produk_detail' => $item->id_produk_detail,
                'status' => 'in',
                'jumlah' => $item->jumlah_produk,
                'keterangan' => 'pembatalan order agen no #'.$item->id_order,
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

}
