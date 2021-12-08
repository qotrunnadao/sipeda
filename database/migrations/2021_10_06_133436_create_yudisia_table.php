<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYudisiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yudisium', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mhs_id')->references('id')->on('mahasiswa');
            $table->string('nosurat')->nullable();
            $table->dateTime('tanggal')->nullable();
            $table->time('waktu')->nullable();
            $table->string('transkip');
            $table->foreignId('status_id')->references('id')->on('statusyudisium')->default(1)->onUpdate('cascade')->onDelete('cascade');
            $table->longText('ket')->nullable();
            $table->foreignId('thnAkad_id')->references('id')->on('tahunakademik')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('yudisium');
    }
}
