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
        Schema::create('rencana', function (Blueprint $table) {
            $table->id('id_rencana');
            $table->string('id_bagian');
            $table->integer('id_proker');
            $table->decimal('volume', 10, 0);
            $table->string('jenis');
            $table->decimal('jumlah', 10, 0);
            $table->decimal('harga_satuan', 18, 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rencana');
    }
};
