<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJualankusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jualankus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->string('gmbr_depan');
            $table->string('gmbr_kiri');
            $table->string('gmbr_kanan');
            $table->string('gmbr_belakang');
            $table->unsignedBigInteger('id_seller');
            $table->unsignedBigInteger('id_kategori');
            $table->unsignedBigInteger('id_lokasi');
            $table->integer('status')->default('1');
            $table->integer('kondisi');
            $table->decimal('harga');
            $table->integer('jumlah');
            $table->integer('berat');
            $table->string('merek');
            $table->string('deskripsi',1200);

            $table->timestamps();

            $table->foreign('id_kategori')->references('id')->on('kategoris');
            $table->foreign('id_seller')->references('id')->on('sellers');
            $table->foreign('id_lokasi')->references('id')->on('lokasis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jualankus');
    }
}
