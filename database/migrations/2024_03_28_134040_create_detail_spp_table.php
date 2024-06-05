<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailSppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * 
     */
    public function up()
{
    Schema::create('detail_spp', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('id_spp');
        $table->string('uraian_kegiatan', 255);
        $table->string('harga', 255);
        $table->string('jumlah', 255);
        $table->string('keterangan')->nullable()->default(null); // Tambahkan default(NULL) di sini
        $table->timestamps();
    
        $table->foreign('id_spp')->references('id')->on('spp')->onDelete('cascade');
    });
}

}
