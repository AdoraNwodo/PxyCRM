<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_name');
            $table->string('project_status');
            $table->string('project_date_range');
            
            $table->integer('project_manager')->unsigned();
            $table->foreign('project_manager')->references('id')->on('users')->onDelete('cascade');
            
            $table->string('project_description');
            
            $table->integer('project_last_modified_by')->unsigned();
            $table->foreign('project_last_modified_by')->references('id')->on('users')->onDelete('cascade');
            
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
        Schema::dropIfExists('projects');
    }
}
