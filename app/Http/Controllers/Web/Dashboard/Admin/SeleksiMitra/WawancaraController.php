<?php

namespace App\Http\Controllers\Web\Dashboard\Admin\SeleksiMitra;

use App\Models\Akun;
use App\Models\User;
use App\Models\Mitra;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class WawancaraController extends Controller
{
    public function index()
    {
        $data = [
            'breadcrumbs' => [
                ['name' => 'Mitra Wawancara', 'url' => '/seleksi-mitra/wawancara'],
            ],
            'isActive' => 'seleksi-mitra.wawancara',
            'mitras' => Mitra::where('status_tahap', 2)->latest()->get(),
        ];
        return view('web.dashboard.admin.SeleksiMitra.wawancara.index', $data);
    }

    public function show(string $id)
    {
        $data = [
            'breadcrumbs' => [
                ['name' => 'Mitra Wawancara', 'url' => '/seleksi-mitra/wawancara'],
                ['name' => 'Detail', 'url' => null],
            ],
            'isActive' => 'seleksi-mitra.wawancara',
            'mitra' => Mitra::find($id),
        ];
        return view('web.dashboard.admin.SeleksiMitra.wawancara.show', $data);
    }

    public function update(string $id)
    {
        $isUpdated = Mitra::find($id)->update([
            'status_tahap' => 3,
        ]);
        if ($isUpdated) {
            return redirect()->route('seleksi-mitra.wawancara')->with('success', 'Mitra lolos seleksi');
        }
        return redirect()->route('seleksi-mitra.wawancara')->with('error', 'Terjadi kesalahan pada database atau server');
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
            return redirect()->back()->with('success', 'Mitra wawancara telah dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan pada database atau server: ' . $e->getMessage());
        }
    }
}
