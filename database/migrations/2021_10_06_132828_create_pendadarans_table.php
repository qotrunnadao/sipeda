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
            $table->dateTime('tanggal')->nullable();
            $table->time('jamMulai')->nullable();
            $table->time('jamSelesai')->nullable();
            $table->string('berkas');
            $table->string('beritaacara')->nullable();
            $table->string('no_surat')->nullable();
            $table->foreignId('penguji1_id')->references('id')->on('dosen')->nullable();
            $table->foreignId('penguji2_id')->references('id')->on('dosen')->nullable();
            $table->foreignId('penguji3_id')->references('id')->on('dosen')->nullable();
            $table->foreignId('penguji4_id')->references('id')->on('dosen')->nullable();
            $table->foreignId('statuspendadaran_id')->references('id')->on('statuspendadaran');
            $table->foreignId('ruangPendadaran_id')->references('id')->on('ruang_pendadaran');
            $table->foreignId('thnAkad_id')->references('id')->on('tahunakademik');
            $table->longText('ket')->nullable();
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
