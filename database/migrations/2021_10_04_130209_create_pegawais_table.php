<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->longText('alamat');
            $table->string('foto')->nullable();
            $table->string('nama');
            $table->string('nohp');
            $table->dateTime('tglLahir')->nullable();
            $table->string('tmptLahir')->default('Indonesia');
            $table->foreignId('agama_id')->references('id')->on('agama')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('jk_id')->references('id')->on('jenkel')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('pegawai');
    }
}
