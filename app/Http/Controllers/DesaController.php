<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desa;
use App\Models\Jenis_Kelamin; // Pastikan ini sesuai dengan nama file Model kamu

class DesaController extends Controller
{
    public function index()
    {
        $dataDesa = Desa::all();
        $dataJenisKelamin = \App\Models\Jenis_Kelamin::all();
        $dataPasien = \App\Models\Pasien::with('desa', 'jenisKelamin')->get();

        return view('desa.index', compact('dataDesa', 'dataJenisKelamin', 'dataPasien'));
    }

public function store(Request $request)
{
    // 1. Validasi
    $request->validate([
        'nama' => 'required|string|max:255',
        'jenis_kelamin' => 'required',
        'desa_id' => 'required|exists:desa,id',
    ]);

    // 2. Cari ID Jenis Kelamin
    $jenisKelamin = \App\Models\Jenis_Kelamin::where('deskripsi', $request->jenis_kelamin)->first();

    if (!$jenisKelamin) {
        return redirect()->back()->with('error', 'Pilihan jenis kelamin tidak valid.');
    }

    // 3. Simpan Data (PASTIKAN NAMA KOLOM SESUAI DATABASE)
    \App\Models\Pasien::create([
        'nama' => $request->nama, // Kalau di tabel kamu panggil $pasien->nama, pakai 'nama' di sini
        'jenis_kelamin_id' => $jenisKelamin->id,
        'desa_id' => $request->desa_id,
        'tanggal_lahir' => now(),
        'usia' => 0,
        'nik' => '0000000000000000',
        'no_hp' => '-',
        'alamat' => '-',
    ]);

    return redirect()->route('desa.index')->with('success', 'Data pasien berhasil disimpan!');
}
}
