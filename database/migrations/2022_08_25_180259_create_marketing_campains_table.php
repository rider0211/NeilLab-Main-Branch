<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketingCampainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketing_campains', function (Blueprint $table) {
            $table->id();
            $table->string('campain_name');
            $table->double('total_fee');
            $table->double('internal_sales_fee');
            $table->double('uni_level_fee');
            $table->double('external_sales_fee');
            $table->double('trust_fee');
            $table->double('profit_fee');
            $table->mediumText('terms');
            $table->string('website_name');
            $table->string('banner_title');
            $table->text('banner_content');
            $table->string('trainee_video');
            $table->string('logo_image');
            $table->unsignedTinyInteger('kyc_required');
            $table->unsignedTinyInteger('status');
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
        Schema::dropIfExists('marketing_campains');
    }
}
