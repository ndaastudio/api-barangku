<?php

use App\Http\Controllers\Web\Dashboard\Admin\PembayaranMitra\DiterimaController;
use App\Http\Controllers\Web\Dashboard\Admin\PembayaranMitra\DitolakController;
use App\Http\Controllers\Web\Dashboard\Admin\PembayaranMitra\MenungguController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Home\LandingController;
use App\Http\Controllers\Web\Home\RekrutmenController;
use App\Http\Controllers\Web\NonaktifkanAkunController;
use App\Http\Controllers\Web\Home\SyaratDanKetentuanController;
use App\Http\Controllers\Web\Dashboard\Admin\SeleksiMitra\CalonController as CalonMitraController;
use App\Http\Controllers\Web\Dashboard\Admin\SeleksiMitra\TerpilihController as MitraTerpilihController;
use App\Http\Controllers\Web\Dashboard\Admin\SeleksiMitra\WawancaraController as MitraWawancaraController;
use App\Http\Controllers\Web\Dashboard\HomeController as DashboardHomeController;
use App\Http\Controllers\Web\Dashboard\LoginController as DashboardLoginController;
use App\Http\Controllers\Web\Dashboard\MemberMitra\KodeController as KodeDaftarController;
use App\Http\Controllers\Web\Dashboard\MemberMitra\MemberAktifController;
use App\Http\Controllers\Web\Dashboard\MemberMitra\MemberNonaktifController;
use App\Http\Controllers\Web\Dashboard\MemberMitra\TelahBayarController;
use App\Http\Controllers\Web\Dashboard\Mitra\Pengaturan\KuotaMarketing\HargaController as HargaMarketingController;
use App\Http\Controllers\Web\Dashboard\Mitra\Pengaturan\KuotaMarketing\KonfirmasiController as KonfirmasiPembayaranController;
use App\Http\Controllers\Web\Dashboard\Mitra\Pengaturan\KuotaMarketing\TambahController as TambahKuotaMarketingController;

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

Route::get('/', [LandingController::class, 'index'])->name('home');

Route::get('/syarat-dan-ketentuan', [SyaratDanKetentuanController::class, 'index']);

Route::get('/rekrutmen', [RekrutmenController::class, 'index'])->name('rekrutmen');
Route::post('/rekrutmen', [RekrutmenController::class, 'store']);

Route::get('/nonaktifkan-akun', [NonaktifkanAkunController::class, 'index'])->name('nonaktifkan-akun');
Route::post('/nonaktifkan-akun', [NonaktifkanAkunController::class, 'store']);

Route::controller(DashboardLoginController::class)->group(function () {
    Route::get('/dashboard/login', 'index')->name('dashboard.login')->middleware('isLogin');
    Route::post('/dashboard/login', 'authtenticate');
    Route::get('/dashboard/logout', 'logout')->name('dashboard.logout');
});

Route::get('/dashboard', [DashboardHomeController::class, 'index'])->name('dashboard')->middleware('auth');

Route::middleware('isAdmin')->group(function () {
    Route::controller(CalonMitraController::class)->group(function () {
        Route::get('/seleksi-mitra/calon', 'index')->name('seleksi-mitra.calon');
        Route::get('/seleksi-mitra/calon/{id}', 'show')->name('seleksi-mitra.calon.id');
        Route::put('/seleksi-mitra/calon/{id}', 'update');
        Route::delete('/seleksi-mitra/calon/{id}', 'destroy');
    });
    Route::controller(MitraWawancaraController::class)->group(function () {
        Route::get('/seleksi-mitra/wawancara', 'index')->name('seleksi-mitra.wawancara');
        Route::get('/seleksi-mitra/wawancara/{id}', 'show')->name('seleksi-mitra.wawancara.id');
        Route::put('/seleksi-mitra/wawancara/{id}', 'update');
        Route::delete('/seleksi-mitra/wawancara/{id}', 'destroy');
    });
    Route::controller(MitraTerpilihController::class)->group(function () {
        Route::get('/seleksi-mitra/terpilih', 'index')->name('seleksi-mitra.terpilih');
        Route::get('/seleksi-mitra/terpilih/{id}', 'show')->name('seleksi-mitra.terpilih.id');
        Route::delete('/seleksi-mitra/terpilih/{id}', 'destroy');
        Route::put('/seleksi-mitra/terpilih/{id}', 'update');
        Route::post('/seleksi-mitra/terpilih/{id}', 'createAkunMitra');
    });
});

Route::controller(KodeDaftarController::class)->group(function () {
    Route::get('/member/kode', 'index')->name('member.kode')->middleware('auth');
    Route::middleware('isMitra')->group(function () {
        Route::post('/member/kode', 'store');
        Route::put('/member/kode/{id}', 'update')->name('member.kode.id');
        Route::delete('/member/kode/{id}', 'destroy');
    });
});
Route::controller(TelahBayarController::class)->group(function () {
    Route::get('/member/telah-bayar', 'index')->name('member.telah-bayar')->middleware('auth');
    Route::put('/member/telah-bayar/{id}', 'update')->name('member.telah-bayar.id')->middleware('isMitra');
});
Route::controller(MemberAktifController::class)->group(function () {
    Route::get('/member/aktif', 'index')->name('member.aktif')->middleware('auth');
    Route::middleware('isMitra')->group(function () {
        Route::put('/member/aktif/{id}', 'update')->name('member.aktif.id');
        Route::delete('/member/aktif/{id}', 'destroy');
        Route::put('/member/aktif/perpanjang/{id}', 'perpanjangMasaAktif')->name('member.aktif.perpanjang.id');
    });
});
Route::controller(MemberNonaktifController::class)->group(function () {
    Route::get('/member/nonaktif', 'index')->name('member.nonaktif')->middleware('auth');
    Route::middleware('isMitra')->group(function () {
        Route::put('/member/nonaktif/{id}', 'update')->name('member.nonaktif.id');
        Route::delete('/member/nonaktif/{id}', 'destroy');
    });
});

Route::middleware('isAdmin')->group(function () {
    Route::controller(MenungguController::class)->group(function () {
        Route::get('/pembayaran-mitra/menunggu', 'index')->name('pembayaran-mitra.menunggu');
        Route::put('/pembayaran-mitra/menunggu/tolak/{id}', 'tolak')->name('pembayaran-mitra.menunggu.tolak.id');
        Route::put('/pembayaran-mitra/menunggu/terima/{id}', 'terima')->name('pembayaran-mitra.menunggu.terima.id');
    });
    Route::controller(DiterimaController::class)->group(function () {
        Route::get('/pembayaran-mitra/diterima', 'index')->name('pembayaran-mitra.diterima');
        Route::put('/pembayaran-mitra/diterima/{id}', 'batal')->name('pembayaran-mitra.diterima.batal.id');
    });
    Route::controller(DitolakController::class)->group(function () {
        Route::get('/pembayaran-mitra/ditolak', 'index')->name('pembayaran-mitra.ditolak');
        Route::put('/pembayaran-mitra/ditolak/{id}', 'batal')->name('pembayaran-mitra.ditolak.batal.id');
    });
});

Route::middleware('isMitra')->group(function () {
    Route::controller(TambahKuotaMarketingController::class)->group(function () {
        Route::get('/kuota-marketing/tambah', 'index')->name('kuota-marketing.tambah');
        Route::post('/kuota-marketing/tambah', 'store');
    });
    Route::controller(KonfirmasiPembayaranController::class)->group(function () {
        Route::get('/kuota-marketing/konfirmasi', 'index')->name('kuota-marketing.konfirmasi');
        Route::put('/kuota-marketing/konfirmasi/{id}', 'update')->name('kuota-marketing.konfirmasi.id');
        Route::get('/kuota-marketing/konfirmasi/{id}', 'edit');
        Route::delete('/kuota-marketing/konfirmasi/{id}', 'destroy');
    });
    Route::controller(HargaMarketingController::class)->group(function () {
        Route::get('/kuota-marketing/harga', 'index')->name('kuota-marketing.harga');
        Route::put('/kuota-marketing/harga', 'update');
    });
});
