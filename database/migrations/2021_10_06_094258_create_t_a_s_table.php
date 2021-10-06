<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTATable extends Migration
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
            $table->string('judulTA');
            $table->string('nama_jabatan');
            $table->string('instansi');
            $table->longText('komisi');
            $table->bigInteger('nilai');
            $table->string('nosurat');
            $table->string('praproposal');
            $table->dateTime('tglAmbil');
            $table->dateTime('tglSPK');
            $table->dateTime('tglDaftar');
            $table->string('keterangan');
            $table->string('judulTAFinal');
            $table->foreignId('mahasiswa_id')->references('id')->on('mahasiswa');
            $table->foreignId('pejabatSK_id')->references('id')->on('jurusan');
            $table->foreignId('status_id')->references('id')->on('status');
            $table->foreignId('pembimbing1_id')->references('id')->on('dosen');
            $table->foreignId('pembimbing2_id')->references('id')->on('dosen');
            $table->foreignId('tahunakademik_id')->references('id')->on('tahunakademik');
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
