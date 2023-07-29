<?php

namespace App\Http\Controllers\API;

use App\Models\Akun;
use App\Models\Jasa;
use App\Models\Barang;
use App\Models\GambarJasa;
use App\Models\GambarBarang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SinkronController extends Controller
{
    public function downloadData(string $id)
    {
        $barang = Barang::where('akun_id', $id)->get();
        $jasa = Jasa::where('akun_id', $id)->get();
        $gambarBarang = GambarBarang::where('akun_id', $id)->get();
        $gambarJasa = GambarJasa::where('akun_id', $id)->get();
        return response()->json([
            'status' => true,
            'message' => 'Data di aplikasi sudah sinkron dengan data di server',
            'data' => [
                'barang' => $barang,
                'jasa' => $jasa,
                'gambar_barang' => $gambarBarang,
                'gambar_jasa' => $gambarJasa
            ]
        ], 201);
    }

    public function deleteAllBarang(string $id)
    {
        Barang::where('akun_id', $id)->delete();
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

    public function deleteAllGambarBarang(string $id)
    {
        GambarBarang::where('akun_id', $id)->delete();
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

    public function deleteAllJasa(string $id)
    {
        Jasa::where('akun_id', $id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Data di server sudah dihapus',
        ], 201);
    }

    public function upDataJasa(Request $request)
    {
        $validatedData = [
            [
                'id_jasa' => 'required',
                'akun_id' => 'required',
                'nama_jasa' => 'required',
                'kategori' => 'required',
                'jumlah_jasa' => 'required',
                'letak_jasa' => 'required',
                'keterangan' => 'required',
                'jadwal_rencana' => 'required',
                'jadwal_notifikasi' => 'required',
                'progress' => 'required',
            ],
            [
                'id_jasa.required' => 'ID jasa tidak boleh kosong',
                'akun_id.required' => 'ID akun tidak boleh kosong',
                'nama_jasa.required' => 'Nama jasa tidak boleh kosong',
                'kategori.required' => 'Kategori tidak boleh kosong',
                'jumlah_jasa.required' => 'Jumlah jasa tidak boleh kosong',
                'letak_jasa.required' => 'Letak jasa tidak boleh kosong',
                'keterangan.required' => 'Keterangan tidak boleh kosong',
                'jadwal_rencana.required' => 'Jadwal rencana tidak boleh kosong',
                'jadwal_notifikasi.required' => 'Jadwal notifikasi tidak boleh kosong',
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
        Jasa::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Data di server sudah sinkron dengan data di aplikasi'
        ], 201);
    }

    public function deleteAllGambarJasa(string $id)
    {
        GambarJasa::where('akun_id', $id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Data di server sudah dihapus',
        ], 201);
    }

    public function upDataGambarJasa(Request $request)
    {
        $validatedData = [
            [
                'akun_id' => 'required',
                'jasa_id' => 'required',
                'gambar' => 'required',
            ],
            [
                'akun_id.required' => 'ID akun tidak boleh kosong',
                'jasa_id.required' => 'ID jasa tidak boleh kosong',
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
        GambarJasa::create($request->all());
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
}
