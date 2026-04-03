<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;

class DesaSeeder extends Seeder
{
    use HasFactory;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Desa::create(['nama_desa' => 'Desa Sukamaju']);
        \App\Models\Desa::create(['nama_desa' => 'Desa Mekarsari']);
        \App\Models\Desa::create(['nama_desa' => 'Desa Sukaraja']);
        \App\Models\Desa::create(['nama_desa' => 'Desa Cibinong']);
    }
}
