<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiBermasalahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_bermasalahs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kode_transaksi');
            $table->date('tanggal_pelaporan');
            $table->string('keterangan');
            $table->integer('status_laporan');
            $table->foreign('kode_transaksi')->references('kode_transaksi')->on('transaksis')->onDelete('cascade');
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
        Schema::dropIfExists('transaksi_bermasalahs');
    }
}
