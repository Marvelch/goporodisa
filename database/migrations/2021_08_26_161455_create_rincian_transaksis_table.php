<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRincianTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rincian_transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kode_transaksi');
            $table->bigInteger('id_jualanku')->unsigned();
            $table->decimal('harga_barang');
            $table->integer('jumlah_pesanan');
            $table->integer('berat_barang');
            $table->unsignedBigInteger('id_alamat_penerima');
            $table->timestamps();

            $table->foreign('id_jualanku')->references('id')->on('jualankus');
            $table->foreign('id_alamat_penerima')->references('id')->on('alamats');
            $table->foreign('kode_transaksi')->references('kode_transaksi')->on('transaksis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rincian_transaksis');
    }
}
