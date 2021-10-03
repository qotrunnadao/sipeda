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
            $table->string('nama');
            $table->string('nim');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('id_jurusan')->references('id')->on('jurusan');
            $table->string('email')->unique();
            $table->string('password');
            $table->decimal('ip');
            $table->decimal('ipk');
            $table->integer('jumlah_sks');
            $table->string('foto')->nullable();
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
