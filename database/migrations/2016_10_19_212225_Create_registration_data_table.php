<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create(
    	'registration_data',
    	function (Blueprint $table)
    	{
    		$table->increments('id');
    		$table->integer('registration_id')->unsigned();    			$table->string('str_name');
    		$table->string('str_col_name');
    		$table->string('str_value');
    		$table->timestamps();
    	}
    	);
    	 
    	Schema::table(
    	'registration_data',
    	function (Blueprint $table)
    	{
    		$table->foreign('registration_id')->references('id')->on('registrations')->onDelete('cascade');
    	}
    	);
    	 
    	Schema::table(
    	'registration_data',
    	function (Blueprint $table)
    	{
    		$table->index('registration_id');
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

    	Schema::table(
    	'registration_data',
    	function (Blueprint $table)
    	{
    		$table->dropForeign('registration_data_registration_id_foreign');
    		$table->dropIndex('registration_data_registration_id_index');
    	}
    	);
    	Schema::drop('registration_data');
    	 
        //
    }
}
