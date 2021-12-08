<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSKSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SK', function (Blueprint $table) {
            $table->id();
            $table->foreignId('yudisium_id')->references('id')->on('yudisium')->onUpdate('cascade')->onDelete('cascade');
            $table->string('fileSK');
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
        Schema::dropIfExists('SK');
    }
}
