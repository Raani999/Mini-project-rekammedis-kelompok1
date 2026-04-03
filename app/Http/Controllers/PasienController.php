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
        $dataPasien = Pasien::with('desa', 'jenisKelamin')->get();

        return view('pasien.index', compact('dataDesa', 'dataJenisKelamin', 'dataPasien'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'desa_id' => 'required|exists:desa,id',
        ]);

        // Cari id jenis kelamin berdasarkan nama
        $jenisKelamin = Jenis_Kelamin::where('nama_jenis_kelamin', $request->jenis_kelamin)->first();

        Pasien::create([
            'nama' => $request->nama,
            'jenis_kelamin_id' => $jenisKelamin->id,
            'desa_id' => $request->desa_id,
        ]);

        return redirect()->back()->with('success', 'Data Pasien berhasil disimpan!');
    }
}
