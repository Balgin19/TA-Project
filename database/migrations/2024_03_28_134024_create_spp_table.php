<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spp', function (Blueprint $table) {
            $table->id(); // Automatically creates an unsignedBigInteger primary key column
            $table->string('nomor_spp', 50)->unique();
            $table->string('bagian');
            $table->string('kepentingan');
            $table->date('tanggal');
            $table->boolean('approve_kepala')->default(false); // Kolom boolean dengan default false
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spp');
    }
}
