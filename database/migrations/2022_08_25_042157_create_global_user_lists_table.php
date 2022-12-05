<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalUserListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_user_lists', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('user_id');
            $table->smallInteger('user_type');
            $table->smallInteger('buy_weight');
            $table->smallInteger('amount_allow_to_buy');
            $table->smallInteger('sell_weight');
            $table->smallInteger('amount_allow_to_sell');
            $table->smallInteger('cold_storage_id');
            $table->string      ('wallet_address');
            $table->smallInteger('set_for_trading_pairs');
            $table->smallInteger('selected_exchange');
            $table->smallInteger('status');
            $table->timestamps  ();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('global_user_lists');
    }
}
