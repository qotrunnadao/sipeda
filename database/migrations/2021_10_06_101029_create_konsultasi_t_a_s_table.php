<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonsultasiTATable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsultasi_TA', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal');
            $table->string('hasil');
            $table->string('topik');
            $table->tinyInteger('verifikasiDosen')->comment('0=false, 1=true')->default('0');
            $table->foreignId('mahasiswa_id')->references('id')->on('mahasiswa');
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
        Schema::dropIfExists('konsultasi_t_a_s');
    }
}
