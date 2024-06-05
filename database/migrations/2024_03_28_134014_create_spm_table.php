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
        Schema::create('spm', function (Blueprint $table) {          
            $table->id('id_spm');
            $table->string('nomor_spm');
            $table->string('dari');
            $table->string('kepada');
            $table->string('dibayarkan_ke');
            $table->string('uang');
            $table->string('keperluan');
            $table->date('tanggal');
            $table->integer('id_spp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spm');
    }
};
