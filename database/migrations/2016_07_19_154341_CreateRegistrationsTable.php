<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create(
    	'registrations',
    	function (Blueprint $table) {
    		$table->increments('id');
    		// foreign key to survey project
    		$table->integer('survey_project_id')->unsigned();
    		$table->integer('int_public_id');
			$table->string('str_ip_address')->nullable();  		
    		$table->timestamps();
    	}
    	);

    	Schema::table(
    	'registrations',
    	function (Blueprint $table)
    	{
    		$table->foreign('survey_project_id')->references('id')->on('survey_projects')->onDelete('cascade');
    	}
    	);
    	 
    	
    	Schema::table(
    	'registrations',
    	function (Blueprint $table)
    	{
    		$table->index('survey_project_id');
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
    	'registrations',
    	function (Blueprint $table)
    	{
    		$table->dropForeign('registrations_survey_project_id_foreign');
    		//   		$table->dropIndex('registration_data_registration_id_index');
    	}
    	);
    	
    	 
    	Schema::table(
    	'registrations',
    	function (Blueprint $table)
    	{
    		$table->dropIndex('registrations_survey_project_id_index');
    		//   		$table->dropIndex('registration_data_registration_id_index');
    	}
    	);
    	
    	 
    	Schema::drop('registrations');
    	 
        //
    }
}
