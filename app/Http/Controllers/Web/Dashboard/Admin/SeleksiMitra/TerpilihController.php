<?php

namespace App\Http\Controllers\Web\Dashboard\Admin\SeleksiMitra;

use App\Models\Akun;
use App\Models\User;
use App\Models\Mitra;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class TerpilihController extends Controller
{
    public function index()
    {
        $data = [
            'breadcrumbs' => [
                ['name' => 'Mitra Terpilih', 'url' => '/seleksi-mitra/terpiih'],
            ],
            'isActive' => 'seleksi-mitra.terpilih',
            'mitras' => Mitra::where('status_tahap', 3)->latest()->get(),
        ];
        return view('web.dashboard.admin.SeleksiMitra.terpilih.index', $data);
    }

    public function show($id)
    {
        $data = [
            'breadcrumbs' => [
                ['name' => 'Mitra Terpilih', 'url' => '/seleksi-mitra/terpilih'],
                ['name' => 'Detail', 'url' => null],
            ],
            'isActive' => 'seleksi-mitra.terpilih',
            'mitra' => Mitra::find($id),
        ];
        return view('web.dashboard.admin.SeleksiMitra.terpilih.show', $data);
    }

    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $akunMitra = User::where('role', 'Mitra')->where('nomor_whatsapp', Mitra::find($id)->nomor_whatsapp);
            $akunMember = Akun::where('mitra_id', $id);
            $isExistFile = Storage::disk('public')->exists(Mitra::find($id)->dokumen_ktp);
            if ($isExistFile) {
                Storage::disk('public')->delete(Mitra::find($id)->dokumen_ktp);
            }
            Mitra::find($id)->delete();
            if ($akunMitra->exists()) {
                $akunMitra->delete();
            }
            if ($akunMember->exists()) {
                $akunMember->update([
                    'mitra_id' => null,
                ]);
            }
            DB::commit();
            return redirect()->back()->with('success', 'Mitra telah dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan pada database atau server: ' . $e->getMessage());
        }
    }

    public function update(string $id)
    {
        try {
            DB::beginTransaction();
            $akunMitra = User::where('role', 'Mitra')->where('nomor_whatsapp', Mitra::find($id)->nomor_whatsapp);
            $akunMember = Akun::where('mitra_id', $id);
            Mitra::find($id)->update(['user_id' => null, 'status_tahap' => 1]);
            if ($akunMitra->exists()) {
                $akunMitra->delete();
            }
            if ($akunMember->exists()) {
                $akunMember->update([
                    'mitra_id' => null,
                ]);
            }
            DB::commit();
            return redirect()->route('seleksi-mitra.terpilih')->with('success', 'Mitra dibatalkan lolos seleksi');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('seleksi-mitra.terpilih')->with('error', 'Terjadi kesalahan pada database atau server: ' . $e->getMessage());
        }
    }

    public function createAkunMitra(string $id)
    {
        try {
            DB::beginTransaction();
            $pwDefault = Str::lower(Str::random(8));
            $data = [
                'nomor_whatsapp' => Mitra::find($id)->nomor_whatsapp,
                'password' => Hash::make($pwDefault),
                'secret_key' => Crypt::encryptString($pwDefault, env('APP_KEY')),
                'role' => 'Mitra',
            ];
            $isCreated = User::create($data);
            Mitra::find($id)->update(['user_id' => $isCreated->id]);
            DB::commit();
            return redirect()->route('seleksi-mitra.terpilih')->with('success', 'Akun mitra telah dibuat');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('seleksi-mitra.terpilih')->with('error', 'Terjadi kesalahan pada database atau server: ' . $e->getMessage());
        }
    }
}
