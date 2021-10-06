<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendadaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendadaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mhs_id')->references('id')->on('mahasiswa');
            $table->string('nosurat');
            $table->string('berkas1');
            $table->string('berkas2');
            $table->string('berkas3');
            $table->foreignId('penguji1_id')->references('id')->on('dosen');
            $table->foreignId('penguji2_id')->references('id')->on('dosen');
            $table->foreignId('penguji3_id')->references('id')->on('dosen');
            $table->foreignId('pejabartsk_id')->references('id')->on('dosen');
            $table->foreignId('status_id')->references('id')->on('status');
            $table->foreignId('thnAkad_id')->references('id')->on('tahunakademik');
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
        Schema::dropIfExists('pendadaran');
    }
}
