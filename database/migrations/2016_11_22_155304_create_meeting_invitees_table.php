<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingInviteesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting_invitees', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('meeting_id')->unsigned();
            $table->foreign('meeting_id')->references('id')->on('meetings')->onDelete('cascade');
            
            $table->integer('invitee_id')->unsigned();
            $table->foreign('invitee_id')->references('id')->on('users')->onDelete('cascade');
            
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
        Schema::dropIfExists('meeting_invitees');
    }
}
