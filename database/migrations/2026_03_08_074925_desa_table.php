<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('desa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_desa'); // Ini untuk menyimpan nama desanya
          //  $table->timestamps();
        });
    }
public function run()
{
    \App\Models\Desa::create(['nama_desa' => 'Desa Sukamaju']);
    \App\Models\Desa::create(['nama_desa' => 'Desa Sukamiskin']);
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desa');
    }
};
