<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOngkirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ongkirs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_lokasi_awal');
            $table->unsignedBigInteger('id_lokasi_akhir');
            $table->decimal('tarif');
            $table->timestamps();

            $table->foreign('id_lokasi_awal')->references('id')->on('lokasis');
            $table->foreign('id_lokasi_akhir')->references('id')->on('lokasis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ongkirs');
    }
}
