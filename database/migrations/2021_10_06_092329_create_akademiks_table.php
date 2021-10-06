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
            $table->tinyInteger('isKP')->comment('0=false, 1=true')->default('0');
            $table->tinyInteger('isTA')->comment('0=false, 1=true')->default('0');
            $table->tinyInteger('isPendadaran')->comment('0=false, 1=true')->default('0');
            $table->tinyInteger('isYudisium')->comment('0=false, 1=true')->default('0');
            $table->bigInteger('sks');
            $table->foreignId('mhs_id')->references('id')->on('mahasiswa');
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
