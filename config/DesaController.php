<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desa;

class DesaController extends Controller
{
public function index()
{
    $desa = \App\Models\Desa::all();
    return view('desa.index', compact('desa'));
}

public function store(Request $request)
{
   $desa = \App\Models\Desa::create([
        'nama_desa' => $request->nama_desa
    ]);
    Desa::create([
        'nama_desa' => $request->nama_desa
    ]);

    return redirect('/desa')->with('success', 'Data desa tersimpan!');
}
}
