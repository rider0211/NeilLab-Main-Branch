<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternalWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_wallets', function (Blueprint $table) {
            $table->id();
            $table->smallInteger("chain_stack");
            $table->string("wallet_address");
            $table->string("private_key");
            $table->smallInteger("wallet_type");
            $table->smallInteger("cold_storage_wallet_id");
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
        Schema::dropIfExists('internal_wallets');
    }
}
