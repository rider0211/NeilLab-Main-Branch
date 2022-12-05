<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketingFeeWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketing_fee_wallets', function (Blueprint $table) {
            $table->id();
            $table->Integer('fee_type');
            $table->Integer('chain_net');
            $table->String ('wallet_address');
            $table->String ('private_key');
            $table->Integer('status');
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
        Schema::dropIfExists('marketing_fee_wallets');
    }
}
