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
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sekolah_id')->constrained('sekolah');
            $table->date('tgl_laporan');
            $table->json('data_murid')->nullable();
            $table->json('data_agama')->nullable();
            $table->json('data_usia')->nullable();
            $table->json('data_absen')->nullable();
            $table->json('data_waktu')->nullable();
            $table->json('data_inventaris')->nullable();
            $table->json('data_guru')->nullable();
            $table->unsignedTinyInteger('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
