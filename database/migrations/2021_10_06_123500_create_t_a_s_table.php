<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TA', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->references('id')->on('mahasiswa');
            $table->string('judulTA');
            $table->string('instansi')->nullable();
            $table->string('praproposal');
            $table->foreignId('pembimbing1_id')->references('id')->on('dosen');
            $table->foreignId('pembimbing2_id')->references('id')->on('dosen');
            $table->dateTime('tglSPK')->nullable();
            $table->dateTime('tglAmbil')->nullable();
            $table->longText('ket')->nullable();
            $table->foreignId('status_id')->references('id')->on('status');
            $table->foreignId('thnAkad_id')->references('id')->on('tahunakademik')->nullable();
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
        Schema::dropIfExists('TA');
    }
}
