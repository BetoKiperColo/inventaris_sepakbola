<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('persewaan_details', function (Blueprint $table) {
            $table->id();

            $table->foreignId('persewaan_id')
                ->constrained('persewaans')
                ->cascadeOnDelete();

            $table->foreignId('barang_id')
                ->constrained('barangs');

            $table->integer('qty');
            $table->integer('harga_sewa');
            $table->integer('subtotal');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('persewaan_details');
    }
};
