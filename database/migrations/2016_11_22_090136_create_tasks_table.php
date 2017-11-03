<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('task_subject');
            $table->string('task_status');
            $table->string('task_priority');
            $table->string('task_start_and_end_date');
            
            $table->integer('task_project')->unsigned();
            $table->foreign('task_project')->references('id')->on('projects')->onDelete('cascade');
            
            $table->integer('task_assigned_to')->unsigned();
            $table->foreign('task_assigned_to')->references('id')->on('users')->onDelete('cascade');
            
            $table->string('task_description');
            
            $table->integer('task_last_modified_by')->unsigned();
            $table->foreign('task_last_modified_by')->references('id')->on('users')->onDelete('cascade');
            
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
        Schema::dropIfExists('tasks');
    }
}
