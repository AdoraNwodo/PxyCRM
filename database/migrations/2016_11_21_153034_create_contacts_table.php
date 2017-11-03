<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contact_title');
            $table->string('contact_first_name');
            $table->string('contact_last_name');
            $table->string('contact_mobile')->unique();
            $table->string('contact_email')->unique();
            
            $table->integer('contact_company')->unsigned();
            $table->foreign('contact_company')->references('id')->on('accounts')->onDelete('cascade');
            
            $table->string('contact_department');
            $table->string('contact_role');
            $table->string('contact_status');
            $table->string('contact_last_modified_by');
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
        Schema::dropIfExists('contacts');
    }
}
