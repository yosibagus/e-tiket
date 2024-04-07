<?php

use App\Http\Controllers\admin\AksesController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\KategoriController;
use App\Http\Controllers\admin\TransaksiController;
use App\Http\Controllers\ETiketController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OtpController;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'login']);
});

Route::get('/u-fest2024/{id}', [ETiketController::class, 'index']);
Route::get('/coba', [OtpController::class, 'coba']);
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout']);

    Route::get('/home', [HomeController::class, 'index']);

    Route::get('/rekapitulasi-transaksi', [TransaksiController::class, 'rekapitulasi']);
    Route::get('/transaksi/{id}/repeat', [TransaksiController::class, 'kirim_ulang']);

    Route::get('/transaksi/{tipe}', [TransaksiController::class, 'index']);
    Route::get('/transaksi/add/{tipe}', [TransaksiController::class, 'create']);
    Route::post('/transaksi/add/{tipe}', [TransaksiController::class, 'store']);

    Route::get('/akses', [AksesController::class, 'index']);
    Route::get('/akses/create', [AksesController::class, 'create']);
    Route::post('/akses/create', [AksesController::class, 'store']);
    Route::get('/akses/{id}/edit', [AksesController::class, 'edit']);
    Route::post('/akses/{id}/edit', [AksesController::class, 'update']);
    Route::get('/akses/{id}/delete', [AksesController::class, 'delete']);

    Route::get('/setting', [KategoriController::class, 'index']);
    Route::get('/setting/create', [KategoriController::class, 'create']);
    Route::post('/setting/create', [KategoriController::class, 'store']);
    Route::get('/setting/{id}/edit', [KategoriController::class, 'edit']);
    Route::post('/setting/{id}/edit', [KategoriController::class, 'update']);
});
