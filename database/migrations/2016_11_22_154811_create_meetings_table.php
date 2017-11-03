<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('meeting_subject');
            $table->string('meeting_status');
            $table->string('meeting_date');
            $table->string('meeting_time');
            $table->string('meeting_duration');
            $table->string('meeting_location');
            
            $table->integer('meeting_assigned_to')->unsigned();
            $table->foreign('meeting_assigned_to')->references('id')->on('users')->onDelete('cascade');
            
            $table->string('meeting_description');
            
            $table->integer('meeting_last_modified_by')->unsigned();
            $table->foreign('meeting_last_modified_by')->references('id')->on('users')->onDelete('cascade');
            
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
        Schema::dropIfExists('meetings');
    }
}
