<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiTASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilaiTA', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ta_id')->references('id')->on('TA');
            $table->foreignId('statusnilai_id')->references('id')->on('statusnilai');
            $table->double('nilaiAngka');
            $table->string('nilaiHuruf');
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
        Schema::dropIfExists('nilaiTA');
    }
}
