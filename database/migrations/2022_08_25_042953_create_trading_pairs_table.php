<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradingPairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trading_pairs', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('exchange_id');
            $table->string('left');
            $table->string('l_chin_stack');
            $table->string('right');
            $table->string('r_chain_stack');
            $table->smallInteger('select_all');
            $table->smallInteger('select_exhcnage_they_can');
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
        Schema::dropIfExists('trading_pairs');
    }
}
