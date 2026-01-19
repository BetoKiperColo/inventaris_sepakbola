<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('persewaan_details', function (Blueprint $table) {
            if (Schema::hasColumn('persewaan_details', 'harga_sewa')) {
                $table->dropColumn('harga_sewa');
            }

            if (Schema::hasColumn('persewaan_details', 'subtotal')) {
                $table->dropColumn('subtotal');
            }
        });

        Schema::table('persewaans', function (Blueprint $table) {
            if (Schema::hasColumn('persewaans', 'total_harga')) {
                $table->dropColumn('total_harga');
            }
        });
    }

    public function down(): void
    {
        Schema::table('persewaan_details', function (Blueprint $table) {
            $table->integer('harga_sewa')->nullable();
            $table->integer('subtotal')->nullable();
        });

        Schema::table('persewaans', function (Blueprint $table) {
            $table->integer('total_harga')->nullable();
        });
    }
};
