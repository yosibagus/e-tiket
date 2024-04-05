<?php

use App\Http\Controllers\admin\AksesController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\KategoriController;
use App\Http\Controllers\admin\TransaksiController;
use App\Http\Controllers\LoginController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout']);

    Route::get('/home', [HomeController::class, 'index']);

    Route::get('/rekapitulasi-transaksi', [TransaksiController::class, 'rekapitulasi']);

    Route::get('/transaksi/{tipe}', [TransaksiController::class, 'index']);
    Route::get('/transaksi/add/{tipe}', [TransaksiController::class, 'create']);
    Route::post('/transaksi/add/{tipe}', [TransaksiController::class, 'store']);

    Route::get('/akses', [AksesController::class, 'index']);

    Route::get('/setting', [KategoriController::class, 'index']);
    Route::get('/setting/create', [KategoriController::class, 'create']);
    Route::post('/setting/create', [KategoriController::class, 'store']);
});
