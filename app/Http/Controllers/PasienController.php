<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Desa;
use App\Models\Jenis_Kelamin;

class PasienController extends Controller
{
    public function index()
    {
        $dataDesa = Desa::all();
        $dataJenisKelamin = Jenis_Kelamin::all();
        $dataPasien = Pasien::with(['desa', 'jenisKelamin'])->get();

        return view('pasien.index', compact('dataDesa', 'dataJenisKelamin', 'dataPasien'));
    }

    public function store(Request $request)
    {
        // Cari id jenis kelamin berdasarkan deskripsi (Laki-laki/Perempuan)
        $jenisKelamin = Jenis_Kelamin::where('deskripsi', $request->jenis_kelamin)->first();

        if (!$jenisKelamin) {
            return redirect()->back()->with('error', 'Pilihan jenis kelamin tidak valid.');
        }

        Pasien::create([
            'nama'             => $request->nama,
            'jenis_kelamin_id' => $jenisKelamin->id,
            'desa_id'          => $request->desa_id,
            'tanggal_lahir'    => now(),
            'usia'             => 0,
            'nik'              => '0000000000000000',
            'alamat'           => '-',
        ]);

        return redirect()->back()->with('success', 'Data pasien berhasil ditambahkan!');
    } // Penutup fungsi store

    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return redirect()->back()->with('success', 'Data pasien berhasil dihapus!');
    } // Penutup fungsi destroy
} // Penutup class PasienController
