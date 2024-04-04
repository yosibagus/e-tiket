<?php

use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\KategoriController;
use App\Http\Controllers\admin\TransaksiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index']);

Route::get('/rekapitulasi-transaksi', [TransaksiController::class, 'rekapitulasi']);

Route::get('/transaksi/{tipe}', [TransaksiController::class, 'index']);
Route::get('/transaksi/add/{tipe}', [TransaksiController::class, 'create']);
Route::post('/transaksi/add/{tipe}', [TransaksiController::class, 'store']);

Route::get('/setting', [KategoriController::class, 'index']);
Route::get('/setting/create', [KategoriController::class, 'create']);
Route::post('/setting/create', [KategoriController::class, 'store']);
