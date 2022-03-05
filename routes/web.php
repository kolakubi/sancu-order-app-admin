<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\CouponController;

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
        return view('main');
    });

    Route::get('/update_item', [StokController::class, 'show'])->name('update_item');
    Route::get('/update_item/edit/{id}', [StokController::class, 'show_update_item']);
    Route::post('/update_item/edit/{id}', [StokController::class, 'update_edit_item']);

    Route::get('/item', [StokController::class, 'show_item'])->name('item');
    Route::get('/tambahitem', [StokController::class, 'show_tambah_item'])->name('tambah_item');
    Route::post('/tambahitem', [StokController::class, 'add_tambah_item']);

    Route::get('/orders', [OrderController::class, 'show'])->name('orders');
    Route::get('/orders/{id}', [OrderController::class, 'show_detail']);

    // resi pengiriman
    Route::get('/printdetailpacking/{id}', [OrderDetailController::class, 'print_resi']);

    // export excel
    Route::get('/ordersdetails/export', [OrderDetailController::class, 'export_excel']);

    // update ongkir
    Route::post('/orders/ongkir', [OrderController::class, 'update_ongkir'])->name('update_ongkir');
    Route::post('/orders/resi', [OrderController::class, 'update_resi'])->name('update_resi');

    Route::get('/stok/import', [StokController::class, 'import_stok_show'])->name('import_stok_show');
    Route::post('/stok/import', [StokController::class, 'import_stok_save']);

    Route::get('/coupon', [CouponController::class, 'show'])->name('coupon');
    Route::get('/coupon/add', [CouponController::class, 'add_coupon_show'])->name('add_coupon');
    Route::post('/coupon/add', [CouponController::class, 'add_coupon_create'])->name('add_coupon');

});