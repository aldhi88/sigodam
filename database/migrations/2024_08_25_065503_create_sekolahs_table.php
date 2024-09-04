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
        Schema::create('sekolah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('nama_sekolah')->unique();
            $table->string('jenis_sekolah');
            $table->string('status_sekolah')->nullable();
            $table->text('jalan')->nullable();
            $table->string('nama_desa')->nullable();
            $table->string('status_desa')->nullable();
            $table->unsignedSmallInteger('tahun_pendirian')->nullable();
            $table->string('kategori_gugus')->nullable();
            $table->double('jarak_ke_camat')->nullable();
            $table->string('status_bangunan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kanin')->nullable();
            $table->string('penilik')->nullable();
            $table->string('no_agenda')->nullable();
            $table->string('nss')->nullable();
            $table->string('npsn')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sekolah');
    }
};
