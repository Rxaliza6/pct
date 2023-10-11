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
        Schema::create('pesananlain', function (Blueprint $table) {
            $table->id('id');
            $table->string('akun_id');
            $table->string('kecamatan_id');
            $table->string('nama')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('provinsi')->default('Kalimantan Barat');
            $table->string('kota')->default('Kota Pontianak');
            $table->text('alamat')->nullable();
            $table->foreignId('teknisi_id')->constrained('teknisi')->onDelete('cascade');
            $table->string('tanggal_datang');
            $table->foreignId('waktu_datang_id');
            $table->string('keterangan')->nullable();
            $table->string('jumlah_ac')->nullable();
            $table->string('ulasan')->nullable();
            $table->enum('kategori',['Alamat Sendiri','Alamat Lain']);
            $table->double('harga')->nullable();
            $table->enum('status',['Dipesan','Diproses','Selesai']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesananlain');
    }
};
