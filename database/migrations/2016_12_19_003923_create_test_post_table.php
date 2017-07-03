<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create(
    	'test_posts',
    	function (Blueprint $table)
    	{
    		$table->increments('id');
//    		$table->integer('registration_id')->unsigned();    			$table->string('str_name');
    		$table->string('str_lead_destination_tested');
    		$table->string('str_test_id');
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
    	Schema::drop('test_posts');
    	 
        //
    }
}
