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
            $table->longText('alamat')->nullable();
            $table->string('foto')->nullable();
            $table->string('nama');
            $table->string('nohp')->nullable();
            $table->string('nip');
            $table->dateTime('tglLahir')->nullable();
            $table->tinyInteger('isKomisi')->comment('0=false, 1=true')->default('0');
            $table->tinyInteger('isKajur')->comment('0=false, 1=true')->default('0');
            $table->string('tmptLahir')->default('Indonesia');
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
        Schema::dropIfExists('dosen');
    }
}
