<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account_name');
            $table->string('account_industry');
            $table->string('account_phone')->unique();
            $table->string('account_email')->unique();
            $table->string('account_address_street');
            $table->string('account_address_city');
            $table->string('account_address_state');
            $table->string('account_address_country');
            
            $table->integer('account_last_modified_by')->unsigned();
            $table->foreign('account_last_modified_by')->references('id')->on('users')->onDelete('cascade');
            
            
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
        Schema::dropIfExists('accounts');
    }
}
