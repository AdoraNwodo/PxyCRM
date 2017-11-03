<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('campaign_name');
            
            $table->integer('campaign_assigned_to')->unsigned();
            $table->foreign('campaign_assigned_to')->references('id')->on('users')->onDelete('cascade');
            
            $table->string('campaign_status');
            $table->string('campaign_type');
            $table->string('campaign_description');
            $table->string('campaign_budget');
            $table->string('campaign_actual_cost');
            $table->string('campaign_expected_revenue');
            $table->string('campaign_expected_cost');
            $table->string('campaign_currency');
            $table->string('campaign_impressions');
            $table->string('campaign_objective');
            
            $table->integer('campaign_last_modified_by')->unsigned();
            $table->foreign('campaign_last_modified_by')->references('id')->on('users')->onDelete('cascade');
            
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
        Schema::dropIfExists('campaigns');
    }
}
