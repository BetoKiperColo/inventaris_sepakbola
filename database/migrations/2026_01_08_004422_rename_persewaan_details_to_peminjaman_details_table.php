<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::rename('persewaan_details', 'peminjaman_details');
    }

    public function down()
    {
        Schema::rename('peminjaman_details', 'persewaan_details');
    }
};
