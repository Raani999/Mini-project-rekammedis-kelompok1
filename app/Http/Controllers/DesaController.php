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
    // 1. Validasi data yang masuk
    $request->validate([
        'nama' => 'required|string|max:255',
        'jenis_kelamin' => 'required',
        'desa_id' => 'required|exists:desa,id',
    ]);

    // 2. Cari jenis kelamin berdasarkan deskripsi (Laki-laki/Perempuan)
    $jenisKelamin = \App\Models\Jenis_Kelamin::where('deskripsi', $request->jenis_kelamin)->first();

    // 3. Cek dulu, kalau jenisKelamin TIDAK ketemu, kasih pesan error
    if (!$jenisKelamin) {
        return redirect()->back()->with('error', 'Pilihan jenis kelamin tidak valid di database.');
    }

    // 4. Kalau ketemu, baru simpan datanya
    \App\Models\Pasien::create([
        'nama_pasien' => $request->nama, // Sesuaikan dengan kolom di diagram Kak Nurul
        'jenis_kelamin_id' => $jenisKelamin->id,
        'desa_id' => $request->desa_id,
        'tanggal_lahir' => now(), // Sementara pakai now() kalau belum ada inputnya
        'usia' => 0,               // Sementara isi 0 dulu
        'nik' => '0000000000000000',
        'no_hp' => '-',
        'alamat' => '-',
    ]);

    return redirect()->back()->with('success', 'Data pasien berhasil disimpan!');
}
}
