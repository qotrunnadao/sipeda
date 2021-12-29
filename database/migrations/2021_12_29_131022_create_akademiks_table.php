<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkademiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akademik', function (Blueprint $table) {
            $table->id();
            $table->double('ipk');
            $table->foreignId('statusKP')->nullable()->references('id')->on('KP')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('statusTA')->nullable()->references('id')->on('TA')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('statusPendadaran')->nullable()->references('id')->on('pendadaran')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('statusYudisium')->nullable()->references('id')->on('yudisium')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('sks');
            $table->foreignId('angkatan')->references('id')->on('mahasiswa')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('mhs_id')->references('id')->on('mahasiswa')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('akademik');
    }
}
