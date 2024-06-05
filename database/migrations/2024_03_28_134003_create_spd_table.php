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
        Schema::create('spd', function (Blueprint $table) {
            $table->id('id_spd');
            $table->string('bagian');
            $table->string('kepentingan');
            $table->string('tahun_anggaran');
            $table->integer('id_spp');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spd');
    }
};
