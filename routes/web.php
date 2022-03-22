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

    Route::get('/', function () {
        return view('dashboard');
    });

    Route::get('/update_item', [StokController::class, 'show'])->name('update_item');
    Route::get('/update_item/edit/{id}', [StokController::class, 'show_update_item']);
    Route::post('/update_item/edit/{id}', [StokController::class, 'update_edit_item']);

    Route::get('/item', [StokController::class, 'show_item'])->name('item');
    Route::get('/tambahitem', [StokController::class, 'show_tambah_item'])->name('tambah_item');
    Route::post('/tambahitem', [StokController::class, 'add_tambah_item']);

    Route::get('/category', [CategoryController::class, 'show'])->name('category');
    Route::get('/category/add', [CategoryController::class, 'show_add'])->name('add_category');
    Route::post('/category/add', [CategoryController::class, 'create']);
    Route::get('/category/update/{id}', [CategoryController::class, 'show_update'])->name('update_category');
    Route::patch('/category/update/{id}', [CategoryController::class, 'update']);

    Route::get('/orders', [OrderController::class, 'show'])->name('orders');
    Route::get('/orders/{id}', [OrderController::class, 'show_detail']);
     // update ongkir
    Route::post('/orders/ongkir', [OrderController::class, 'update_ongkir'])->name('update_ongkir');
    Route::post('/orders/potongan_harga_langsung', [OrderController::class, 'update_potongan_harga_langsung'])->name('update_potongan_harga_langsung');
    Route::post('/orders/resi', [OrderController::class, 'update_resi'])->name('update_resi');
    Route::post('/orders/batal', [OrderController::class, 'order_batal']);

    Route::get('/whatsapp', [WhatsappController::class, 'show'])->name('whatsapp');
    Route::post('/whatsapp', [WhatsappController::class, 'update']);

    // resi pengiriman
    Route::get('/printdetailpacking/{id}', [OrderDetailController::class, 'print_resi']);

    // export excel
    Route::get('/ordersdetails/export', [OrderDetailController::class, 'export_excel']);

    Route::get('/stok/import', [StokController::class, 'import_stok_show'])->name('import_stok_show');
    Route::post('/stok/import', [StokController::class, 'import_stok_save']);

    Route::get('/coupon', [CouponController::class, 'show'])->name('coupon');
    Route::get('/coupon/add', [CouponController::class, 'add_coupon_show'])->name('add_coupon');
    Route::post('/coupon/add', [CouponController::class, 'add_coupon_create'])->name('add_coupon');

    Route::get('/user', [UserController::class, 'show'])->name('user');
    Route::get('/user/add', [UserController::class, 'add_user_show'])->name('add_user');
    Route::post('/user/add', [UserController::class, 'add_user_create']);
    Route::get('/user/edit/{id}', [UserController::class, 'edit_user_show']);
    Route::post('/user/edit/{id}', [UserController::class, 'edit_user_update']);
});