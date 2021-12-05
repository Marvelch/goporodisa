<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdTokoToRincianTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rincian_transaksis', function (Blueprint $table) {
            $table->unsignedBigInteger('id_toko');

            $table->foreign('id_toko')->references('id')->on('tokos');
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
            $table->dropColumn('id_toko');
        });
    }
}
