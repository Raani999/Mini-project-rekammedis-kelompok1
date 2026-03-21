<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desa;

class DesaController extends Controller
{
public function index() {
    $dataDesa = Desa::all();
    $datajenis_Kelamin = \App\Models\Jenis_Kelamin::all();
    return view('desa.index', compact('dataDesa', 'datajenis_Kelamin'));
}

public function store(Request $request)
    {
        $request->validate([
            'nama_desa' => 'required|unique:desa,nama_desa',
        ]);

        Desa::create($request->all());
        return redirect()->back()->with('success', 'Data desa tersimpan!');
    } // <--- Pastikan ada kurung tutup ini untuk mengakhiri fungsi store

    public function destroy($id)
    {
        $desa = \App\Models\Desa::findOrFail($id);
        $desa->delete();

        return redirect()->back()->with('success', 'Data desa berhasil dihapus!');
    }
}
