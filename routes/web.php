<?php

use App\Http\Controllers\Web\Dashboard\Admin\PembayaranMitra\DiterimaController;
use App\Http\Controllers\Web\Dashboard\Admin\PembayaranMitra\DitolakController;
use App\Http\Controllers\Web\Dashboard\Admin\PembayaranMitra\MenungguController;
use App\Http\Controllers\Web\Dashboard\Admin\ReqHapusAkunController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Home\LandingController;
use App\Http\Controllers\Web\Home\RekrutmenController;
use App\Http\Controllers\Web\HapusAkunController;
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
use App\Http\Controllers\Web\Dashboard\Mitra\Pengaturan\HargaJualController;
use App\Http\Controllers\Web\Dashboard\Mitra\Pengaturan\KuotaMarketing\BayarController as PembayaranController;
use App\Http\Controllers\Web\Dashboard\Mitra\Pengaturan\KuotaMarketing\BeliController as BeliKuotaMarketingController;
use App\Http\Controllers\Web\Dashboard\PasswordController;

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

Route::get('/download', function () {
    return view('web.download');
});

Route::get('/syarat-dan-ketentuan', [SyaratDanKetentuanController::class, 'index']);

Route::get('/rekrutmen', [RekrutmenController::class, 'index'])->name('rekrutmen');
Route::post('/rekrutmen', [RekrutmenController::class, 'store']);

Route::get('/hapus-akun', [HapusAkunController::class, 'index'])->name('hapus-akun');
Route::post('/hapus-akun', [HapusAkunController::class, 'store']);

Route::controller(DashboardLoginController::class)->group(function () {
    Route::get('/dashboard/login', 'index')->name('dashboard.login')->middleware('isLogin');
    Route::post('/dashboard/login', 'authtenticate');
    Route::get('/dashboard/logout', 'logout')->name('dashboard.logout');
});

Route::middleware('isAuth')->group(function () {
    Route::get('/dashboard', [DashboardHomeController::class, 'index'])->name('dashboard');
    Route::controller(PasswordController::class)->group(function () {
        Route::get('/password', 'index')->name('password');
        Route::get('/password/edit', 'edit')->name('password.edit');
        Route::put('/password/edit', 'update');
    });
});

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
    Route::get('/member/kode', 'index')->name('member.kode')->middleware('isAuth');
    Route::middleware('isMitra')->group(function () {
        Route::post('/member/kode', 'store');
        Route::put('/member/kode/{id}', 'update')->name('member.kode.id');
        Route::put('/member/nomor/{id}', 'updateNomor')->name('member.update.nomor.id');
        Route::delete('/member/kode/{id}', 'destroy');
    });
});
Route::controller(TelahBayarController::class)->group(function () {
    Route::get('/member/telah-bayar', 'index')->name('member.telah-bayar')->middleware('isAuth');
    Route::put('/member/telah-bayar/{id}', 'update')->name('member.telah-bayar.id')->middleware('isMitra');
});
Route::controller(MemberAktifController::class)->group(function () {
    Route::get('/member/aktif', 'index')->name('member.aktif')->middleware('isAuth');
    Route::middleware('isAdmin')->group(function () {
        Route::put('/member/aktif/{id}', 'update')->name('member.aktif.id');
        Route::delete('/member/aktif/{id}', 'destroy');
    });
    Route::put('/member/aktif/perpanjang/{id}', 'perpanjangMasaAktif')->name('member.aktif.perpanjang.id')->middleware('isMitra');
});
Route::controller(MemberNonaktifController::class)->group(function () {
    Route::get('/member/nonaktif', 'index')->name('member.nonaktif')->middleware('isAuth');
    Route::middleware('isAdmin')->group(function () {
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
    Route::controller(BeliKuotaMarketingController::class)->group(function () {
        Route::get('/kuota-marketing/beli', 'index')->name('kuota-marketing.beli');
        Route::post('/kuota-marketing/beli', 'store');
    });
    Route::controller(PembayaranController::class)->group(function () {
        Route::get('/kuota-marketing/bayar', 'index')->name('kuota-marketing.bayar');
        Route::put('/kuota-marketing/bayar/{id}', 'update')->name('kuota-marketing.bayar.id');
        Route::get('/kuota-marketing/bayar/{id}', 'edit');
        Route::delete('/kuota-marketing/bayar/{id}', 'destroy');
    });
    Route::controller(HargaJualController::class)->group(function () {
        Route::get('/harga-jual', 'index')->name('harga-jual');
        Route::get('/harga-jual/edit', 'edit')->name('harga-jual.edit');
        Route::put('/harga-jual/edit', 'update');
    });
});

Route::middleware('isAdmin')->group(function () {
    Route::controller(ReqHapusAkunController::class)->group(function () {
        Route::get('/request-hapus-akun', 'index')->name('member.request.hapus');
        Route::delete('/request-hapus-akun/{id}', 'destroy')->name('member.request.hapus.id');
    });
});
