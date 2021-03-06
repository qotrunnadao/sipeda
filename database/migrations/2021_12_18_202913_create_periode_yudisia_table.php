<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodeYudisiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periode_yudisium', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->tinyInteger('aktif')->comment('0=false, 1=true')->default('1');
            $table->string('namaPeriode')->nullable();
            $table->string('nosurat')->nullable();
            $table->date('tanggal')->nullable();
            $table->time('waktu')->nullable();
            $table->string('fileSK')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periode_yudisium');
    }
}
