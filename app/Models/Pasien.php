<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    // Nama tabel di database (sesuaikan kalau namamu 'pasien' atau 'pasiens')
    protected $table = 'pasien';

    // Kolom yang boleh diisi (Mass Assignment)
    protected $fillable = ['nama', 'jenis_kelamin_id', 'desa_id'];

    // Relasi ke Model Jenis_Kelamin
    public function jenisKelamin()
    {
        return $this->belongsTo(Jenis_Kelamin::class, 'jenis_kelamin_id');
    }

    // Relasi ke Model Desa
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}
