<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController; // Kita pakai logika simpan dari sini

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama langsung ke /desa
Route::get('/', function () {
    return redirect('/desa');
});

Route::post('/pasien', [PasienController::class, 'store'])->name('pasien.store');

// OR, if you are using a resource controller:
Route::resource('pasien', PasienController::class);

// Kita buat rute /desa TAPI isinya menjalankan fungsi di PasienController
Route::get('/desa', [PasienController::class, 'index'])->name('desa.index');
Route::post('/desa', [PasienController::class, 'store'])->name('desa.store');
