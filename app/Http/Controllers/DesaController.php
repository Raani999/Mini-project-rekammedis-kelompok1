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
        // Memanggil model Jenis_Kelamin secara langsung
        $datajenis_Kelamin = \App\Models\Jenis_Kelamin::all();

        return view('desa.index', compact('dataDesa', 'datajenis_Kelamin'));
    }

    public function store(Request $request)
{
    $request->validate([
        'jenis_kelamin' => 'required',
        'desa_id'       => 'required',
    ]);

    \App\Models\Desa::create([
        'nama_desa'     => $request->desa_id,
        'jenis_kelamin' => $request->jenis_kelamin,
    ]);

    return redirect()->back()->with('success', 'Data Pasien berhasil disimpan!');
}
}
