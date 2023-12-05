<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamlocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examlocations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->text('nomor_peserta');
            $table->text('nama');
            $table->text('lokasi_jabatan');
            $table->string('titik_lokasi')->default('');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examlocations');
    }
}
