<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kode_transaksi')->unique();
            $table->date('tanggal_transaksi');
            $table->unsignedBigInteger('id_user');
            $table->decimal('biaya_layanan');
            $table->decimal('biaya_pengiriman');
            $table->decimal('total_bayar');
            $table->integer('ketegori_pengiriman');
            $table->integer('metode_pembayaran');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
