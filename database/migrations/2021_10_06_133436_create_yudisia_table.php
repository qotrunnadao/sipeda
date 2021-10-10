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
            $table->tinyInteger('status')->comment('0=proses review', '1=diterima', '2=ditolak', '3=selesai')->default(0);
            $table->longText('ket')->nullable();
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
        Schema::dropIfExists('yudisium');
    }
}
