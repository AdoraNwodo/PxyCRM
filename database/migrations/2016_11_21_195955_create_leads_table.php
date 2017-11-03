<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lead_title');
            $table->string('lead_first_name');
            $table->string('lead_last_name');
            $table->string('lead_mobile')->unique();
            $table->string('lead_email')->unique();
            
            $table->integer('lead_company')->unsigned();
            $table->foreign('lead_company')->references('id')->on('accounts')->onDelete('cascade');
            
            $table->string('lead_department');
            $table->string('lead_role');
            $table->string('lead_status');
            $table->string('lead_source');
            $table->string('lead_status_description');
            $table->string('lead_source_description');
            
            $table->integer('lead_assigned_to')->unsigned();
            $table->foreign('lead_assigned_to')->references('id')->on('users')->onDelete('cascade');
            $table->integer('lead_last_modified_by')->unsigned();
            $table->foreign('lead_last_modified_by')->references('id')->on('users')->onDelete('cascade');
            
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
        Schema::dropIfExists('leads');
    }
}
