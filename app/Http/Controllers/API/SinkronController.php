<?php

namespace App\Http\Controllers\API;

use App\Models\Akun;
use App\Models\Barang;
use App\Models\GambarBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SinkronController extends Controller
{
    public function downloadData(string $id)
    {
        $barang = Barang::where('akun_id', $id)->get();
        $gambarBarang = GambarBarang::where('akun_id', $id)->get();
        return response()->json([
            'status' => true,
            'message' => 'Data di aplikasi sudah sinkron dengan data di server',
            'data' => [
                'barang' => $barang,
                'gambar_barang' => $gambarBarang,
            ]
        ], 201);
    }

    public function deleteBarangById(string $id_user, string $id_barang)
    {
        Barang::where('akun_id', $id_user)->where('id_barang', $id_barang)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Data di server sudah dihapus',
        ], 201);
    }

    public function upDataBarang(Request $request)
    {
        $validatedData = [
            [
                'id_barang' => 'required',
                'akun_id' => 'required',
                'nama_barang' => 'required',
                'kategori' => 'required',
                'status' => 'required',
                'extend_status' => 'required',
                'jumlah_barang' => 'required',
                'letak_barang' => 'required',
                'keterangan' => 'required',
                'jadwal_rencana' => 'required',
                'jadwal_notifikasi' => 'required',
                'reminder' => 'required',
                'progress' => 'required',
            ],
            [
                'id_barang.required' => 'ID barang tidak boleh kosong',
                'akun_id.required' => 'ID akun tidak boleh kosong',
                'nama_barang.required' => 'Nama barang tidak boleh kosong',
                'kategori.required' => 'Kategori tidak boleh kosong',
                'status.required' => 'Status tidak boleh kosong',
                'extend_status.required' => 'Extend status tidak boleh kosong',
                'jumlah_barang.required' => 'Jumlah barang tidak boleh kosong',
                'letak_barang.required' => 'Letak barang tidak boleh kosong',
                'keterangan.required' => 'Keterangan tidak boleh kosong',
                'jadwal_rencana.required' => 'Jadwal rencana tidak boleh kosong',
                'jadwal_notifikasi.required' => 'Jadwal notifikasi tidak boleh kosong',
                'reminder.required' => 'Reminder tidak boleh kosong',
                'progress.required' => 'Progress tidak boleh kosong',
            ]
        ];
        $validator = Validator::make($request->all(), $validatedData[0], $validatedData[1]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ], 401);
        }
        Barang::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Data di server sudah sinkron dengan data di aplikasi'
        ], 201);
    }

    public function deleteGambarBarangById(string $id_user, string $id_gambar_barang)
    {
        GambarBarang::where('akun_id', $id_user)->where('id_gambar_barang', $id_gambar_barang)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Data di server sudah dihapus',
        ], 201);
    }

    public function upDataGambarBarang(Request $request)
    {
        $validatedData = [
            [
                'akun_id' => 'required',
                'barang_id' => 'required',
                'gambar' => 'required',
            ],
            [
                'akun_id.required' => 'ID akun tidak boleh kosong',
                'barang_id.required' => 'ID barang tidak boleh kosong',
                'gambar.required' => 'Nama gambar tidak boleh kosong',
            ]
        ];
        $validator = Validator::make($request->all(), $validatedData[0], $validatedData[1]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ], 401);
        }
        GambarBarang::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Data di server sudah sinkron dengan data di aplikasi'
        ], 201);
    }

    public function upDatetimeSinkron(Request $request)
    {
        $validatedData = [
            [
                'akun_id' => 'required',
            ],
            [
                'akun_id.required' => 'ID akun tidak boleh kosong',
            ]
        ];
        $validator = Validator::make($request->all(), $validatedData[0], $validatedData[1]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ], 401);
        }
        date_default_timezone_set('Asia/Jakarta');
        $lastSinkron = date('Y-m-d H:i:s');
        Akun::find($request->akun_id)->update([
            'tanggal_sinkron' => $lastSinkron
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Tanggal sinkron telah diperbarui',
            'tanggal_sinkron' => $lastSinkron
        ], 201);
    }

    public function checkExpiredDataUpload(string $id)
    {
        try {
            $tanggalSinkron = Akun::find($id)->tanggal_sinkron;
            date_default_timezone_set('Asia/Jakarta');
            $currentDate = date('Y-m-d H:i:s');
            $expiredDate = date('Y-m-d H:i:s', strtotime($tanggalSinkron . ' + 2 day'));
            if ($currentDate > $expiredDate) {
                DB::beginTransaction();
                Barang::where('akun_id', $id)->delete();
                GambarBarang::where('akun_id', $id)->delete();
                DB::commit();
                return response()->json([
                    'status' => true,
                    'message' => 'Data di server telah dihapus',
                ], 201);
            }
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'status' => false,
                'message' => 'Data di server gagal dihapus ' . $th->getMessage(),
            ], 401);
        }
    }
}
