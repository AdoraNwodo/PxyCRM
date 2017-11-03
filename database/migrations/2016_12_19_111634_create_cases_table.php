<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('priority');
            $table->string('state');
            $table->string('status');
            $table->string('type');
            $table->string('suggestions');
            $table->string('description');
            $table->string('resolution');
            
            $table->integer('account')->unsigned();
            $table->foreign('account')->references('id')->on('accounts')->onDelete('cascade');
            
            $table->integer('assigned_to')->unsigned();
            $table->foreign('assigned_to')->references('id')->on('users')->onDelete('cascade');
            
        
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
        Schema::dropIfExists('cases');
    }
}
