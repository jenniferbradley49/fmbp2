<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create(
    	'clients',
    	function (Blueprint $table) {
    		$table->increments('id');
    		//foreign keys
    		$table->integer('user_id')->unsigned();
    		$table->integer('survey_project_id')->unsigned();
    		// end foreign keys
 			$table->boolean('bool_active')->default(1);  		
			$table->boolean('bool_confirmed')->nullable();
// next four are relevant to controlling access to leads
    		$table->integer('int_pre_existing_leads_paid')->unsigned()->default(0);
    		$table->integer('int_pre_existing_leads_received')->unsigned()->default(0);
    		$table->integer('int_real_time_leads_paid')->unsigned()->default(0);
    		$table->integer('int_real_time_leads_received')->unsigned()->default(0);
			$table->integer('int_state_id')->nullable();
			$table->string('str_city')->nullable();				
			$table->string('str_company')->nullable();
    		$table->string('str_crm')->nullable();
    		$table->string('str_crm_website')->nullable();
    		$table->string('str_email_two')->nullable();
    		$table->string('str_first_name')->nullable();
    		$table->string('str_last_name')->nullable();
    		$table->string('str_lead_destination')->nullable();
    		$table->string('str_lead_destination_tested')->nullable();
			$table->string('str_cloaked_client_id');
    		$table->string('str_telephone_one')->nullable();
    		$table->string('str_telephone_two')->nullable();
    		$table->string('str_website')->nullable();
    		$table->string('str_zip')->nullable();
 			// included the postfix _lead to differential from the var name
 			// in the same client table referring to the client
/* 			$table->string('str_first_name_lead')->default('first_name');
 			$table->string('str_last_name_lead')->default('last_name');
 			$table->string('str_email_lead')->default('email');
 			$table->string('str_address_one_lead')->default('address_one');
 			$table->string('str_address_two_lead')->default('address_two');
 			$table->string('str_city_lead')->default('city');
 			$table->string('str_zip_lead')->default('zip');
 			$table->string('str_genre_lead')->default('genre');
 			$table->string('str_schedule_lead')->default('schedule');
 			$table->string('str_contact_time_lead')->default('contact_time');
 			$table->string('str_age_lead')->default('age');
 			$table->string('str_formats_lead')->default('formats');
 			$table->string('str_salutation_lead')->default('salutation');
 			$table->string('str_state_lead')->default('state');
 			$table->string('str_telephone_lead')->default('telephone');
*/ 			
    		$table->timestamps();
    	}
    	);
    	 
    	
    	Schema::table(
    	'clients',
    	function (Blueprint $table)
    	{
    		$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    	    $table->foreign('survey_project_id')->references('id')->on('survey_projects')->onDelete('cascade');
    	}
    	);
    	

    	Schema::table(
    	'clients',
    	function (Blueprint $table)
    	{
    		$table->index('user_id');
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
    	'clients',
    	function (Blueprint $table)
    	{
    		$table->dropForeign('clients_user_id_foreign');
    		$table->dropForeign('clients_survey_project_id_foreign');
    		//   		$table->dropIndex('registration_data_registration_id_index');
    	}
    	);
    	 
    	 
    	Schema::table(
    	'clients',
    	function (Blueprint $table)
    	{
    		$table->dropIndex('clients_survey_project_id_index');
    		$table->dropIndex('clients_user_id_index');
    	}
    	);
    	 
    	Schema::drop('clients');
    	 
        //
    }
}
