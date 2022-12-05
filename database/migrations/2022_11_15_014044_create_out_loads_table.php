<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutLoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('out_loads', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('trade_id');
            $table->smallInteger('trade_type');
            $table->smallInteger('exchange_id');
            $table->smallInteger('user_id');
            $table->smallInteger('current_amount');
            $table->smallInteger('total_amount');
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
        Schema::dropIfExists('out_loads');
    }
}
