<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelulusansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelulusan', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('mhs_id')->references('id')->on('mahasiswa')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('pendadaran_id')->references('id')->on('pendadaran')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('yudisium_id')->references('id')->on('yudisium')->onUpdate('cascade')->onDelete('cascade');
            $table->dateTime('tanggal_masuk')->nullable();
            $table->string('no_alumni')->nullable();
            $table->string('lama_studi')->nullable();
            $table->string('predikat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelulusan');
    }
}
