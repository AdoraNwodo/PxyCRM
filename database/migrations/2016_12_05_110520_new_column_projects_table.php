<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewColumnProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('projects',function($table){
            $table->integer('project_account')->unsigned();
            $table->foreign('project_account')->references('id')->on('accounts')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('projects',function($table){
            $table->dropColumn('project_account');
        });

    }
}
