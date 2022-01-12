<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TA', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->references('id')->on('mahasiswa');
            $table->string('judulTA');
            $table->string('instansi')->nullable();
            $table->string('no_surat')->nullable();
            $table->string('namaDosen')->nullable();
            $table->string('nip')->nullable();
            $table->string('praproposal');
            $table->foreignId('pembimbing1_id')->nullable()->unsigned()->references('id')->on('dosen')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('pembimbing2_id')->nullable()->unsigned()->references('id')->on('dosen')->onUpdate('cascade')->onDelete('cascade');
            $table->date('spkMulai')->nullable();
            $table->date('spkSelesai')->nullable();
            $table->longText('ket')->nullable();
            $table->foreignId('status_id')->references('id')->on('status')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('thnAkad_id')->references('id')->on('tahunakademik')->nullable()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('TA');
    }
}
