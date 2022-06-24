<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Notification;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function get_notifications(){

        $notifications = Notification::get_notif_detail_admin();
        foreach($notifications as $notif){
            if($notif->tipe == 1){
                $notif->tipe = 'Pesanan Baru';
            }
            elseif($notif->tipe == 2){
                $notif->tipe = 'Di Proses';
            }
            elseif($notif->tipe == 3){
                $notif->tipe = 'Konfirmasi Pembayaran';
            }
            elseif($notif->tipe == 4){
                $notif->tipe = 'Dikirim';
            }
            elseif($notif->tipe == 5){
                $notif->tipe = 'Selesai';
            }
            elseif($notif->tipe == 6){
                $notif->tipe = 'Pesanan dibatalkan';
            }
        }

        return view('notification', [
            'title' => 'Notification',
            'notifications' => $notifications
        ]);
    }

    public function admin_read($id){
        // update read jadi true
        Notification::where('id', $id)
            ->update([
                'dilihat' => 1
            ]);

        // get id_order
        $id_order = Notification::where('id', $id)
            ->first();

        $id_order = $id_order->id_order;

        return redirect('/orders/'.$id_order);
    }

    public function get_total_unread_admin(){
        $jumlah_notif = Notification::where('id_user', 'admin')
                        ->where('dilihat', 0)
                        ->get()->count();

        return $jumlah_notif;
    }
}
