<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create(
    	             'survey_questions',
    	             function (Blueprint $table) {
    		                 $table->increments('id');
    						$table->integer('survey_project_id')->unsigned();
    		                 $table->boolean('bool_include');
    		                 $table->boolean('bool_multiple_responses');
    		                 $table->boolean('bool_two_columns');
    		                 $table->string('str_name');
    		                 $table->string('str_text');
    						$table->boolean('bool_first');
    						$table->boolean('bool_last');
    						$table->string('str_next', 50)->nullable();
    						$table->string('str_prev', 50)->nullable();
    		                 $table->timestamps();
    		             }
    	         );

    	Schema::table(
    	'survey_questions',
    	function (Blueprint $table)
    	{
    		$table->foreign('survey_project_id')->references('id')->on('survey_projects')->onDelete('cascade');
    	}
    	);

    	Schema::table(
    	'survey_questions',
    	function (Blueprint $table)
    	{
    		$table->index('survey_project_id');
    	}
    	);
    	
    	 
    	
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    	Schema::table(
    	'survey_questions',
    	function (Blueprint $table)
    	{
    		$table->dropForeign('survey_questions_survey_project_id_foreign');
    		//   		$table->dropIndex('registration_data_registration_id_index');
    	}
    	);
    	
    	 
    	Schema::table(
    	'survey_questions',
    	function (Blueprint $table)
    	{
    		$table->dropIndex('survey_questions_survey_project_id_index');
    		//   		$table->dropIndex('registration_data_registration_id_index');
    	}
    	);
    	 
    	
    	Schema::drop('survey_questions');
    	
    }
}
