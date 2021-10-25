<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->longText('alamat');
            $table->string('foto')->nullable();
            $table->string('nama');
            $table->string('nohp');
            $table->dateTime('tglLahir')->nullable();
            $table->tinyInteger('isKomisi')->comment('0=false, 1=true')->default('0');
            $table->tinyInteger('isKajur')->comment('0=false, 1=true')->default('0');
            $table->string('tmptLahir')->default('Indonesia');
            $table->foreignId('agama_id')->references('id')->on('agama');
            $table->foreignId('jk_id')->references('id')->on('jenkel');
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
        Schema::dropIfExists('dosen');
    }
}
