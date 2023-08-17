<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UpdateController;
use App\Http\Controllers\API\SinkronController;
use App\Http\Controllers\API\Auth\MailController;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function () {
        return auth()->user();
    });
    Route::post('/logout', [LoginController::class, 'logoutAkun']);
    Route::post('/ganti-pw', [LoginController::class, 'directGantiPw']);
    Route::get('/download-data/{id}', [SinkronController::class, 'downloadData']);
    Route::delete('/barang/hapus/{id_user}/{id_barang}', [SinkronController::class, 'deleteBarangById']);
    Route::post('/barang/upload', [SinkronController::class, 'upDataBarang']);
    Route::delete('/gambar-barang/hapus/{id_user}/{id_gambar_barang}', [SinkronController::class, 'deleteGambarBarangById']);
    Route::post('/gambar-barang/upload', [SinkronController::class, 'upDataGambarBarang']);
    Route::post('/akun/sinkron', [SinkronController::class, 'upDatetimeSinkron']);
    Route::delete('/akun/data/{id}', [SinkronController::class, 'deleteAllData']);
});

Route::get('/kode-daftar/{kode_daftar}', [RegisterController::class, 'getAkunByKodeDaftar']);
Route::post('/register', [RegisterController::class, 'registerAkun']);
Route::post('/login', [LoginController::class, 'loginAkun']);
Route::post('/lupa-password', [MailController::class, 'sendKodeLupaPw']);
Route::post('/verif-lupa-pw', [MailController::class, 'verifKodeLupaPw']);
Route::get('/cek-update-app', [UpdateController::class, 'getLatestVersion']);
