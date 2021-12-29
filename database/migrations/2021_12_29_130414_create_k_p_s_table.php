<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKPSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('KP', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->references('id')->on('mahasiswa');
            $table->string('judulKP');
            $table->string('instansi')->nullable();
            $table->string('no_surat')->nullable();
            $table->string('proposal');
            $table->foreignId('pembimbing_id')->references('id')->on('dosen')->onUpdate('cascade')->onDelete('cascade');
            $table->dateTime('tglSPK')->nullable();
            $table->dateTime('tglAmbil')->nullable();
            $table->longText('ket')->nullable();
            $table->foreignId('statuskp_id')->references('id')->on('statuskp')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('thnAkad_id')->references('id')->on('tahunakademik')->nullable()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('KP');
    }
}
