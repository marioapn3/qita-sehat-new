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
        Schema::create('daftar_polis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pasien')->constrained('pasiens')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_jadwal')->constrained('jadwal_periksas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('keluhan');
            $table->integer('no_antrian');
            $table->enum('status', ['Menunggu', 'Dalam Periksa', 'Selesai'])->default('Menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_polis');
    }
};
