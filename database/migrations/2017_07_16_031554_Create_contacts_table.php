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
    	Schema::create(
    	'contacts',
    	function (Blueprint $table) {
    		$table->increments('id');
     		$table->string('str_first_name');
     		$table->string('str_last_name');
     		$table->string('str_telephone');
     		$table->string('str_email');
     		$table->string('text_message');
     		$table->timestamps();
    	}
    	);
    	 
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::drop('contacts');
    	 
        //
    }
}
