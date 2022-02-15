<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Management\CategoryController;
use App\Http\Controllers\Cashier\CashierController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/management', function () {
    return view('management.index');
});
Route::get('/cashier', [\App\Http\Controllers\Cashier\CashierController::class, 'index']);
Route::get('/cashier/getMenuByCategory/{category_id}', [\App\Http\Controllers\Cashier\CashierController::class,'getMenuByCategory']);
Route::get('/cashier/getTable', [\App\Http\Controllers\Cashier\CashierController::class, 'getTables']);
Route::get('/cashier/getSaleDetailsByTable/{table_id}', [\App\Http\Controllers\Cashier\CashierController::class,'getSaleDetailsByTable']);


Route::post('/cashier/orderFood', [\App\Http\Controllers\Cashier\CashierController::class ,'orderFood']);
Route::post('/cashier/deleteSaleDetail', [\App\Http\Controllers\Cashier\CashierController::class ,'deleteSaleDetail']);


Route::post('/cashier/confirmOrderStatus', [\App\Http\Controllers\Cashier\CashierController::class ,'confirmOrderStatus']);
Route::post('/cashier/savePayment', [\App\Http\Controllers\Cashier\CashierController::class ,'savePayment']);
Route::get('/cashier/showReceipt/{saleID}', [\App\Http\Controllers\Cashier\CashierController::class ,'showReceipt']);


Route::resource('management/category', \App\Http\Controllers\Management\CategoryController::class);
Route::resource('management/menu', \App\Http\Controllers\Management\MenuController::class);
Route::resource('management/table', \App\Http\Controllers\Management\TableController::class);

