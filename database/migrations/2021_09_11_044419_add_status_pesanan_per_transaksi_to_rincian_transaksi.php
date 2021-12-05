<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusPesananPerTransaksiToRincianTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rincian_transaksis', function (Blueprint $table) {
            $table->integer('status_pesanan_per_transaksi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rincian_transaksis', function (Blueprint $table) {
            $table->dropColumn('status_pesanan_per_transaksi');
        });
    }
}
