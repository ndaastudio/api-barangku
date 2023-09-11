<?php

namespace App\Http\Controllers\Web\Dashboard\Admin\SeleksiMitra;

use App\Models\Akun;
use App\Models\User;
use App\Models\Mitra;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CalonController extends Controller
{
    public function index()
    {
        $data = [
            'breadcrumbs' => [
                ['name' => 'Calon Mitra', 'url' => '/seleksi-mitra/calon'],
            ],
            'isActive' => 'seleksi-mitra.calon',
            'mitras' => Mitra::where('status_tahap', 1)->latest()->get(),
        ];
        return view('web.dashboard.admin.SeleksiMitra.calon.index', $data);
    }

    public function show(string $id)
    {
        $data = [
            'breadcrumbs' => [
                ['name' => 'Calon Mitra', 'url' => '/seleksi-mitra/calon'],
                ['name' => 'Detail', 'url' => null],
            ],
            'isActive' => 'seleksi-mitra.calon',
            'mitra' => Mitra::find($id),
        ];
        return view('web.dashboard.admin.SeleksiMitra.calon.show', $data);
    }

    public function update(string $id)
    {
        $isUpdated = Mitra::find($id)->update([
            'status_tahap' => 2,
        ]);
        if ($isUpdated) {
            return redirect()->route('seleksi-mitra.calon')->with('success', 'Mitra lanjut tahap wawancara');
        }
        return redirect()->route('seleksi-mitra.calon')->with('error', 'Terjadi kesalahan pada database atau server');
    }

    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $akunMitra = User::where('role', 'Mitra')->where('nomor_whatsapp', Mitra::find($id)->nomor_whatsapp);
            $akunMember = Akun::where('mitra_id', $id);
            $isExistFile = Storage::disk('public')->exists(Mitra::find($id)->dokumen_cv);
            if ($isExistFile) {
                Storage::disk('public')->delete(Mitra::find($id)->dokumen_cv);
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
            return redirect()->back()->with('success', 'Calon mitra telah dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan pada database atau server: ' . $e->getMessage());
        }
    }
}
