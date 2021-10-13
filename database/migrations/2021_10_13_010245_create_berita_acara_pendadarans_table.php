<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaAcaraPendadaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beritaacara_pendadaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendadaran_id')->references('id')->on('pendadaran');
            $table->string('beritaacara');
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
        Schema::dropIfExists('beritaacara_pendadaran');
    }
}
