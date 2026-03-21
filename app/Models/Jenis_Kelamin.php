<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_Kelamin extends Model
{
protected $table = 'jenis_kelamin';
protected $fillable = ['nama_jenis_kelamin'];
public $timestamps = false;
use \Illuminate\Database\Eloquent\Factories\HasFactory;
}

