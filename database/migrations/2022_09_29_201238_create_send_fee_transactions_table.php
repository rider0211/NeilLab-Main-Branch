<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSendFeeTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('send_fee_transactions', function (Blueprint $table) {
            $table->id();
            $table->Integer ('fee_type');
            $table->Integer ('chain_net');
            $table->double  ('amount');
            $table->String  ('tx_id');
            $table->Integer ('user_id');
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
        Schema::dropIfExists('send_fee_transactions');
    }
}
