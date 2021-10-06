<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSempropTASTable extends Migration
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
            $table->string('namajabatan');
            $table->string('beritaacara');
            $table->double('nilai');
            $table->string('nilaiHuruf');
            $table->string('nosurat');
            $table->string('distribusi');
            $table->string('statussia');
            $table->dateTime('tglCetak');
            $table->dateTime('tglEntriNilai');
            $table->dateTime('tglUploadSIA');
            $table->foreignId('jadwal_id')->references('id')->on('jadwal');
            $table->foreignId('pejabatsk_id')->references('id')->on('dosen');
            $table->foreignId('statusDosen_id')->references('id')->on('status');
            $table->foreignId('statusBapendik_id')->references('id')->on('status');
            $table->foreignId('ta_id')->references('id')->on('TA');
            $table->foreignId('statusnilai_id')->references('id')->on('statusnilai');
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
