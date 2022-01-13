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
            $table->foreignId('ta_id')->references('id')->on('TA')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('statusnilai_id')->references('id')->on('statusnilai')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('nilai_huruf_id')->references('id')->on('nilai_huruf')->onUpdate('cascade')->onDelete('cascade');
            $table->double('nilaiAngka');
            // $table->string('nilaiHuruf');
            $table->foreignId('user_id')->nullable()->references('id')->on('user')->onUpdate('cascade')->onDelete('cascade');
            $table->string('ket')->nullable();
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
