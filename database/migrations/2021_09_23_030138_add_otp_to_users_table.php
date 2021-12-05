<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOtpToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('otp_code')->nullable();
            $table->integer('otp_status')->nullable();
            $table->float('phone')->nullable();
            $table->float('phone_verified')->nullable();
            $table->date('block_otp_time')->nullable();
            $table->integer('total_request')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('otp_code');
            $table->dropColumn('otp_status');
            $table->dropColumn('phone');
            $table->dropColumn('phone_verified');
            $table->dropColumn('block_otp_time');
            $table->dropColumn('total_request');
        });
    }
}
