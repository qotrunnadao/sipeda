<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSempropTATable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sempropTA', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jabatan');
            $table->string('beritaAcara');
            $table->double('nilai');
            $table->string('nilaiHuruf');
            $table->string('nosurat');
            $table->string('distribusi');
            $table->string('statusSIA');
            $table->dateTime('tglCetak');
            $table->dateTime('tglEntriNilai');
            $table->dateTime('tglUploadSIA');
            $table->foreignId('jadwal_id')->references('id')->on('jadwal');
            $table->foreignId('pejabatSK_id')->references('id')->on('jurusan');
            $table->foreignId('statusDosen_id')->references('id')->on('statusDosen');
            $table->foreignId('statusBapendik_id')->references('id')->on('statusBapendik');
            $table->foreignId('TA_id')->references('id')->on('TA');
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
        Schema::dropIfExists('sempropTA');
    }
}
