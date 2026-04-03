<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisKelaminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
{
    \App\Models\Jenis_Kelamin::create(['deskripsi' => 'Laki-laki']);
    \App\Models\Jenis_Kelamin::create(['deskripsi' => 'Perempuan']);
}
    }
}
