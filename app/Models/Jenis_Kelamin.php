<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_Kelamin extends Model
{
    use HasFactory;

    // KUNCI UTAMA: Kasih tahu Laravel nama tabelnya cuma 'jenis_kelamin'
    protected $table = 'jenis_kelamin';

    // Matikan timestamps karena tadi sudah dihapus di database
    public $timestamps = false;

    protected $fillable = ['deskripsi'];
}
