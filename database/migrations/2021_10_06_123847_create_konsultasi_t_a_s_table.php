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
            $table->tinyInteger('verifikasiDosen')->comment('0=menunggu, 1=diterima', '2=ditolak')->default('0');
            $table->foreignId('ta_id')->references('id')->on('ta')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('dosen_id')->references('id')->on('dosen')->onUpdate('cascade')->onDelete('cascade');
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
