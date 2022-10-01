<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WhatsappController;
use App\Http\Controllers\KartuStokController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\LogItemController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::group(['middleware'=>'auth'], function(){

    Route::get('/', [DashboardController::class, 'show'])->name('dashboard');
    
    Route::get('/notification', [NotificationController::class, 'get_notifications'])->name('notification');
    Route::get('/notification/read/{id}', [NotificationController::class, 'admin_read']);
    Route::get('/notification/get_total_unread', [NotificationController::class, 'get_total_unread_admin']);

    Route::get('/item', [StokController::class, 'show_item'])->name('item');
    Route::get('/tambahitem', [StokController::class, 'show_tambah_item'])->name('tambah_item');
    Route::post('/tambahitem', [StokController::class, 'add_tambah_item']);
    Route::get('/tambahitem_pelengkap', [StokController::class, 'show_tambah_item_pelengkap'])->name('tambah_item_pelengkap');
    Route::get('/update_item/edit/{id}', [StokController::class, 'show_update_item']);
    Route::post('/update_item/edit/{id}', [StokController::class, 'update_edit_item']);

    Route::get('/category', [CategoryController::class, 'show'])->name('category');
    Route::get('/category/add', [CategoryController::class, 'show_add'])->name('add_category');
    Route::post('/category/add', [CategoryController::class, 'create']);
    Route::get('/category/update/{id}', [CategoryController::class, 'show_update'])->name('update_category');
    Route::patch('/category/update/{id}', [CategoryController::class, 'update']);

    Route::get('/stok_masuk', [StokController::class, 'stok_masuk_show'])->name('stok_masuk');
    Route::get('/stok_masuk/add/{id}', [StokController::class, 'stok_masuk_add_show']);
    Route::post('/stok_masuk/add/{id}', [StokController::class, 'stok_masuk_add']);

    Route::get('/stok_keluar', [StokController::class, 'stok_keluar_show'])->name('stok_keluar');
    Route::get('/stok_keluar/add/{id}', [StokController::class, 'stok_keluar_add_show']);
    Route::post('/stok_keluar/add/{id}', [StokController::class, 'stok_keluar_add']);

    Route::get('/kartu_stok', [KartuStokController::class, 'kartu_stok_show'])->name('kartu_stok');
    Route::post('/kartu_stok', [KartuStokController::class, 'kartu_stok_show_data']);
    Route::get('/kartu_stok/get_produk', [KartuStokController::class, 'get_produk']);
    Route::post('/kartu_stok/get_produk_size', [KartuStokController::class, 'get_produk_size']);

    Route::get('/orders', [OrderController::class, 'show'])->name('orders');
    Route::get('/orders/{id}', [OrderController::class, 'show_detail']);
    Route::post('/orders/edit_alamat_dropship', [OrderController::class, 'edit_alamat_dropship']);
    // update ongkir
    Route::post('/orders/ongkir', [OrderController::class, 'update_ongkir'])->name('update_ongkir');
    Route::post('/orders/potongan_harga_langsung', [OrderController::class, 'update_potongan_harga_langsung'])->name('update_potongan_harga_langsung');
    Route::post('/orders/penambahan_harga_langsung', [OrderController::class, 'update_penambahan_harga_langsung'])->name('update_penambahan_harga_langsung');
    Route::post('/orders/update_keterangan_packing', [OrderController::class, 'update_keterangan_packing'])->name('update_keterangan_packing');
    Route::post('/orders/resi', [OrderController::class, 'update_resi'])->name('update_resi');
    Route::post('/orders/batal', [OrderController::class, 'order_batal']);
    Route::post('/orders/selesai', [OrderController::class, 'order_selesai']);

    Route::get('/whatsapp', [WhatsappController::class, 'show'])->name('whatsapp');
    Route::post('/whatsapp', [WhatsappController::class, 'update']);

    // resi pengiriman
    Route::get('/printdetailpacking/{id}', [OrderDetailController::class, 'print_detail_packing']);

    // export excel
    Route::get('/ordersdetails/export/{id}', [OrderDetailController::class, 'export_excel']);

    Route::get('/stok/import', [StokController::class, 'import_stok_show'])->name('import_stok_show');
    Route::post('/stok/import', [StokController::class, 'import_stok_save']);

    Route::get('/coupon', [CouponController::class, 'show'])->name('coupon');
    Route::get('/coupon/add', [CouponController::class, 'add_coupon_show'])->name('add_coupon');
    Route::post('/coupon/add', [CouponController::class, 'add_coupon_create'])->name('add_coupon');

    Route::get('/penjualan', [PenjualanController::class, 'show'])->name('penjualan');
    Route::post('/penjualan', [PenjualanController::class, 'get_data_penjualan']);
    Route::get('/penjualan_per_db', [PenjualanController::class, 'show_penjualan_per_db'])->name('penjualan_per_db');
    Route::get('/penjualan_per_db/get_db', [PenjualanController::class, 'get_db']);
    Route::post('/penjualan_per_db', [PenjualanController::class, 'get_data_penjualan_per_db']);

    Route::get('/log_item', [LogItemController::class, 'show'])->name('log_item');

    Route::get('/user', [UserController::class, 'show'])->name('user');
    Route::get('/user/add', [UserController::class, 'add_user_show'])->name('add_user');
    Route::post('/user/add', [UserController::class, 'add_user_create']);
    Route::get('/user/edit/{id}', [UserController::class, 'edit_user_show']);
    Route::post('/user/edit/{id}', [UserController::class, 'edit_user_update']);
});