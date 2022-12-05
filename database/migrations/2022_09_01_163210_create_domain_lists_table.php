<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domain_lists', function (Blueprint $table) {
            $table->id();
            $table->string      ('domain_name');
            $table->string      ('signup_page');
            $table->string      ('agreement_page');
            $table->string      ('last_page');
            $table->smallInteger('signup_user_number');
            $table->smallInteger('status');
            $table->smallInteger('del_flag');
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
        Schema::dropIfExists('domain_lists');
    }
}
