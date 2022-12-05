<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangeInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchange_infos', function (Blueprint $table) {
            $table->id();
            $table->string('ex_name');
            $table->string('ex_login');
            $table->string('ex_password');
            $table->string('api_key');
            $table->string('api_secret');
            $table->string('ex_sms_phone_number')->nullable();
            $table->string('api_login')->nullable();
            $table->string('api_password')->nullable();
            $table->string('api_account_name')->nullable();
            $table->string('api_passphase')->nullable();
            $table->string('api_fund_password')->nullable();
            $table->string('api_doc')->nullable();
            $table->string('api_doc_link')->nullable();
            $table->string('bank_login')->nullable();
            $table->string('bank_password')->nullable();
            $table->string('bank_link')->nullable();
            $table->string('bank_other')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_telegram')->nullable();
            $table->string('contact_whatsapp')->nullable();
            $table->string('contact_skype')->nullable();
            $table->string('contact_boom_boom_chat')->nullable();
            $table->smallInteger('state')->nullable();
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
        Schema::dropIfExists('exchange_infos');
    }
}
