<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('contacts',function($table){
           $table->integer('contact_assigned_to')->unsigned();
            $table->foreign('contact_assigned_to')->references('id')->on('users')->onDelete('cascade'); 
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
        Schema::table('contacts',function($table){
            $table->dropColumn('contact_assigned_to');
        });
    }
}
