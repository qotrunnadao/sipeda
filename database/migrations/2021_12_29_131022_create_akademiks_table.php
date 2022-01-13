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
            $table->double('ipk')->nullable();
            $table->foreignId('statusKP')->nullable()->references('id')->on('KP')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('statusTA')->nullable()->references('id')->on('TA')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('statusPendadaran')->nullable()->references('id')->on('pendadaran')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('statusYudisium')->nullable()->references('id')->on('yudisium')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('sks')->nullable();
            $table->foreignId('angkatan')->nullable();
            $table->date('TAMulai')->nullable();
            $table->foreignId('mhs_id')->references('id')->on('mahasiswa')->onUpdate('cascade')->onDelete('cascade');
            $table->string('TASelesai')->nullable();
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
