<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create(
    	'survey_projects',
    	function (Blueprint $table) {
    		$table->increments('id');
    		$table->string('str_text');
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
    	Schema::drop('survey_projects');
    	 
        //
    }
}
