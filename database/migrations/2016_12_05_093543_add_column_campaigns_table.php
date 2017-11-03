<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        //
        Schema::table('campaigns',function($table){
            $table->integer('campaign_account')->unsigned();
            $table->foreign('campaign_account')->references('id')->on('accounts')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('campaigns',function($table){
            $table->dropColumn('campaign_account');
        });
    }
}
