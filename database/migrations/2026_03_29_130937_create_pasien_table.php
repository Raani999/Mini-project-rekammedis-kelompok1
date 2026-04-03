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
    Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik', 16);
            $table->date('tanggal_lahir');
            $table->integer('usia');
            $table->string('alamat');
            $table->unsignedBigInteger('jenis_kelamin_id');
            $table->unsignedBigInteger('desa_id');
         //   $table->timestamps();

            // Foreign key ke jenis_kelamin
            $table->foreign('jenis_kelamin_id')->references('id')->on('jenis_kelamin')->onDelete('cascade');

            // Foreign key ke desa
            $table->foreign('desa_id')->references('id')->on('desa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};
