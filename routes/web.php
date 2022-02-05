<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;

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

Route::get('/', function () {
    return view('main');
});

Route::get('/orders', [OrderController::class, 'show'])->name('orders');
Route::get('/orders/{id}', [OrderController::class, 'show_detail']);

// export excel
Route::get('/ordersdetails/export', [OrderDetailController::class, 'export_excel']);

// update ongkir
Route::post('/orders/ongkir', [OrderController::class, 'update_ongkir'])->name('update_ongkir');