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
            $table->string('nohp');
            $table->dateTime('tglLahir')->nullable();
            $table->string('tmptLahir')->default('indonesia');
            $table->foreignId('agama_id')->references('id')->on('agama');
            $table->foreignId('jurusan_id')->references('id')->on('jurusan');
            $table->foreignId('user_id')->references('id')->on('user');
            $table->foreignId('pembimbing1_id')->references('id')->on('dosen');
            $table->foreignId('pembimbing2_id')->references('id')->on('dosen')->nullable();
            $table->foreignId('penguji1_id')->references('id')->on('dosen')->nullable();
            $table->foreignId('penguji2_id')->references('id')->on('dosen')->nullable();
            $table->foreignId('penguji3_id')->references('id')->on('dosen')->nullable();
            $table->foreignId('penguji4_id')->references('id')->on('dosen')->nullable();

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
