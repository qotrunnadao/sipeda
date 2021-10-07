<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiTATable extends Migration
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
            $table->foreignId('TA_id')->references('id')->on('TA');
            $table->foreignId('status_nilai_id')->references('id')->on('status_nilai');
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
