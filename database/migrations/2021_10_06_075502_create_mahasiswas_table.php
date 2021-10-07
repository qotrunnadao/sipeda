<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->longText('alamat');
            $table->string('foto')->default('NULL');
            $table->string('nama');
            $table->string('nim');
            $table->string('nohp');
            $table->dateTime('tglLahir')->nullable();
            $table->string('tmptLahir')->default('indonesia');
            $table->foreignId('agama_id')->references('id')->on('agama');
            $table->foreignId('jurusan_id')->references('id')->on('jurusan');
            $table->foreignId('user_id')->references('id')->on('user');
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
        Schema::dropIfExists('mahasiswa');
    }
}
