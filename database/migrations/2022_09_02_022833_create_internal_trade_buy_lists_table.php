<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternalTradeBuyListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_trade_buy_lists', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('user_id');
            $table->smallInteger('cronjob_list');
            $table->smallInteger('asset_purchased');
            $table->float       ('buy_amount',15,6);
            $table->string      ('delivered_address');
            $table->string      ('sender_address');
            $table->string      ('internal_treasury_wallet_id');
            $table->float       ('pay_with',15,6);
            $table->smallInteger('chain_stack');
            $table->smallInteger('pay_method');
            $table->string      ('transaction_description');
            $table->smallInteger('commision_id');
            $table->smallInteger('bank_changes');
            $table->smallInteger('left_over_profit');
            $table->smallInteger('total_amount_left');
            $table->string      ('tx_id');
            $table->smallInteger('state');
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
        Schema::dropIfExists('internal_trade_buy_lists');
    }
}
