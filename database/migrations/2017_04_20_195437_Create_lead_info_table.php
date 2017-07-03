<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadInfoTable extends Migration
{
	// this table corresponds to the lead info
	// needed for a project, lead_vars correspond 
	// to the indiv client
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create(
    	'lead_info',
    	function (Blueprint $table)
    	{
    		$table->increments('id');
    		/* foreign keys
    		 * 
    		 */
    		$table->integer('survey_project_id')->unsigned(); 
    		/* end foreign leys
    		 * 
    		 */
    		$table->string('str_col_name');
    		$table->string('str_value');
    		$table->timestamps();
    	}
    	);
    	 
    	
    	Schema::table(
    	'lead_info',
    	function (Blueprint $table)
    	{
    		$table->foreign('survey_project_id')->references('id')->on('survey_projects')->onDelete('cascade');
    	}
    	);
    	
    	
    	Schema::table(
    	'lead_info',
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
    	'lead_info',
    	function (Blueprint $table)
    	{
    		$table->dropForeign('lead_info_survey_project_id_foreign');
       		$table->dropIndex('lead_info_survey_project_id_index');
    	}
    	);

    	Schema::drop('lead_info');
    	 
    	//
    }
}
