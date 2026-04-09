<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    // Hubungan ke Desa
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }

    // Hubungan ke Jenis Kelamin
    public function jenisKelamin()
    {
        return $this->belongsTo(Jenis_Kelamin::class, 'jenis_kelamin_id');
    }

    protected $table = 'pasien';
    public $timestamps = false; // Matikan kalau kolom created_at tidak ada di DB

    protected $fillable = [
        'nama',
        'jenis_kelamin_id',
        'desa_id',
        'tanggal_lahir',
        'usia',
        'nik',
        'alamat'
    ];
}
