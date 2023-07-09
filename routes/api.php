<?php

use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\MailController;
use Illuminate\Support\Facades\Route;
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
});

Route::get('/kode-daftar', [RegisterController::class, 'getAkunByKodeDaftar']);
Route::post('/register', [RegisterController::class, 'registerAkun']);
Route::post('/login', [LoginController::class, 'loginAkun']);
Route::post('/lupa-password', [MailController::class, 'sendKodeLupaPw']);
Route::post('/verif-lupa-pw', [MailController::class, 'verifKodeLupaPw']);
