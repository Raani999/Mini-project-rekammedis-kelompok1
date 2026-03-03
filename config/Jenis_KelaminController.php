<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis_Kelamin;

class Jenis_KelaminController extends Controller
{
 public function index()
{
    $jenis_kelamin = Jenis_Kelamin::all();
    return view('jenis_kelamin.index', compact('jenis_kelamin'));
}

public function store(Request $request)
{
    Jenis_Kelamin::create([
        'nama_jenis_kelamin' => $request->nama_jenis_kelamin
    ]);

    return redirect()->back();
}
   //
}
