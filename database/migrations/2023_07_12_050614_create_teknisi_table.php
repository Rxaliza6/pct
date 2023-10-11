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
        Schema::create('teknisi', function (Blueprint $table) {
            $table->id('id');
            $table->string('nama_teknisi');
            $table->string('alamat');
            $table->string('jenis_kelamin');
            $table->string('no_hp');
            $table->string('tpt_lhr');
            $table->string('tgl_lhr');
            $table->string('kecamatan_id');
            $table->enum('bidang',['Pencucian Ac','Service AC']);
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teknisi');
    }
};
