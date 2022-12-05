<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraws', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('trade_type');
            $table->smallInteger('trade_id');
            $table->smallInteger('superload_id');
            $table->smallInteger('exchange_id');
            $table->string      ('withdraw_order_id');
            $table->float       ('amount',15,6);
            $table->smallInteger('manual_flag');
            $table->smallInteger('status');
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
        Schema::dropIfExists('withdraws');
    }
}
