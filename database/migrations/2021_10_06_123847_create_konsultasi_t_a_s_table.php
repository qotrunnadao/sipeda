<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonsultasiTASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsultasiTA', function (Blueprint $table) {
            $table->id();
            $table->string('hasil');
            $table->dateTime('tanggal')->nullable();
            $table->string('topik');
            $table->tinyInteger('verifikasiDosen')->comment('0=false, 1=true')->default('0');
            $table->foreignId('mhs_id')->references('id')->on('mahasiswa');
            $table->foreignId('dosen_id')->references('id')->on('dosen');
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
        Schema::dropIfExists('konsultasiTA');
    }
}
