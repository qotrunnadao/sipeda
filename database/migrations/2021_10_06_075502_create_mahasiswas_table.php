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
            $table->longText('alamat')->nullable();
            $table->string('foto')->default('NULL');
            $table->string('nama');
            $table->string('nim');
            $table->string('ipk')->nullable();
            $table->bigInteger('sks')->nullable();
            $table->string('angkatan')->nullable();
            $table->string('nohp')->nullable();
            $table->dateTime('tglLahir')->nullable();
            $table->string('tmptLahir')->default('indonesia');
            $table->foreignId('agama_id')->nullable()->references('id')->on('agama')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('jk_id')->nullable()->references('id')->on('jenkel')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('jurusan_id')->references('id')->on('jurusan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('user')->onUpdate('cascade')->onDelete('cascade');
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
