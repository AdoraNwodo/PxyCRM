<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('opportunity_name');
            
            $table->integer('opportunity_company')->unsigned();
            $table->foreign('opportunity_company')->references('id')->on('accounts')->onDelete('cascade');
            
            $table->string('opportunity_closing_date');
            $table->string('opportunity_currency');
            $table->string('opportunity_amount');
            $table->string('opportunity_status');
            $table->string('opportunity_sales_stage');
            $table->string('opportunity_lead_source');
            
            $table->integer('opportunity_assigned_to')->unsigned();
            $table->foreign('opportunity_assigned_to')->references('id')->on('users')->onDelete('cascade');
            
            $table->string('opportunity_description');
            
            $table->integer('opportunity_last_modified_by')->unsigned();
            $table->foreign('opportunity_last_modified_by')->references('id')->on('users')->onDelete('cascade');
            
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
        Schema::dropIfExists('opportunities');
    }
}
