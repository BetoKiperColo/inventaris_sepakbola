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
        Schema::create('persewaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->constrained('barangs')->cascadeOnDelete();
            $table->string('nama_penyewa');
            $table->string('no_hp');
            $table->date('tgl_sewa');
            $table->date('tgl_kembali');
            $table->integer('lama_sewa');
            $table->integer('total_harga');
            $table->string('jaminan_sewa');
            $table->enum('status', ['disewa', 'kembali'])->default('disewa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persewaans');
    }
};
