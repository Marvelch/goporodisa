<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_seller');
            $table->unsignedBigInteger('id_lokasi');
            $table->string('nama_toko');
            $table->string('alamat');
            $table->timestamps();

            $table->foreign('id_lokasi')->references('id')->on('lokasis');
            $table->foreign('id_seller')->references('id')->on('sellers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tokos');
    }
}
