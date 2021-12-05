<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdSellerToRincianTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rincian_transaksis', function (Blueprint $table) {
            $table->unsignedBigInteger('id_seller')->nullable();

            $table->foreign('id_seller')->references('id')->on('sellers')->onDelete('cascade');
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
            $table->dropColumn('id_seller');
        });
    }
}
