<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('call_subject');
            $table->string('call_status');
            $table->string('call_time');
            $table->string('call_date');
            
            $table->integer('call_assigned_to')->unsigned();
            $table->foreign('call_assigned_to')->references('id')->on('users')->onDelete('cascade');
            
            $table->string('call_description');
            
            $table->string('call_last_modified_by');
            $table->foreign('call_last_modified_by')->references('id')->on('users')->onDelete('cascade');
            
            $table->string('call_to');
            $table->foreign('call_to')->references('id')->on('contacts')->onDelete('cascade');
            
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
        Schema::dropIfExists('calls');
    }
}
