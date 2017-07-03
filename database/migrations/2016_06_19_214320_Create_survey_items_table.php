<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create(
			'survey_items',
   			function (Blueprint $table) 
   			{
    			$table->increments('id');
    			$table->integer('survey_question_id')->unsigned();
    			$table->boolean('bool_include');
// the next row is the order of presentation, start with 100, increment by 10
    			$table->integer('int_order')->default(100);
    			$table->string('str_text');
   				$table->string('str_mult_resps_id', 20)->nullable();
    			$table->timestamps();
    		}
   		);
    	
    	Schema::table(
    		'survey_items',
    		function (Blueprint $table) 
    		{
    			$table->foreign('survey_question_id')->references('id')->on('survey_questions')->onDelete('cascade');
    		}
    	);
    	
    	Schema::table(
    		'survey_items',
    		function (Blueprint $table)
    		{
    			$table->index('survey_question_id');
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
    		'survey_items',
    		function (Blueprint $table)
    		{
    			$table->dropForeign('survey_items_survey_question_id_foreign');
    			$table->dropIndex('survey_items_survey_question_id_index');
    		}
    	);
    	Schema::drop('survey_items');
    	 
    }
}
