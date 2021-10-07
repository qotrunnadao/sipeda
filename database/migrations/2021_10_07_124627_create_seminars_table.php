<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeminarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seminar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ta_id')->references('id')->on('TA');
            $table->foreignId('jenis_id')->references('id')->on('jenis_seminar');
            $table->string('beritaacara')->nullable();
            $table->dateTime('jamMulai')->nullable();
            $table->dateTime('jamSelesai')->nullable();
            $table->date('tanggal')->nullable();
            $table->foreignId('ruang_id')->references('id')->on('ruang');
            $table->tinyInteger('status')->comment('0=menunggu, 1=disetujui, 2=ditolak')->default('0');
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
        Schema::dropIfExists('seminar');
    }
}
