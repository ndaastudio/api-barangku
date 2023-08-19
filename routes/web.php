<?php

use App\Http\Controllers\Web\HomeController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/syarat-dan-ketentuan', [HomeController::class, 'syaratDanKetentuan']);
Route::get('/register-tester', [HomeController::class, 'registerTester']);
Route::post('/register-tester', [HomeController::class, 'submitRegisterTester']);
