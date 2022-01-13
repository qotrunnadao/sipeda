<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiPendadaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_pendadaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendadaran_id')->references('id')->on('Pendadaran')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('statusnilai_id')->references('id')->on('statusnilai')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('nilai_huruf_id')->references('id')->on('nilai_huruf')->onUpdate('cascade')->onDelete('cascade');
            $table->string('pengaju')->nullable();
            $table->string('ket')->nullable();
            $table->double('nilaiAngka');
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
        Schema::dropIfExists('nilai_pendadaran');
    }
}
