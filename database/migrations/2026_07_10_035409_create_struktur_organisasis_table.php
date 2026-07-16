<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('struktur_organisasasis', function (Blueprint $table) {
            $table->id();
            $table->text('konten'); // Untuk menyimpan isi komponen organisasi
            $table->string('gambar_struktur')->nullable(); // Opsional jika ada upload bagan gambar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('struktur_organisasasis');
    }
};