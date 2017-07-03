<?php

use Illuminate\Database\Seeder;
use App\Models\Survey_project;
use App\Models\Survey_question;

class survey_questions_table_seeder extends Seeder
{
	
	var $survey_project;
	
	public function __construct(
			Survey_project $survey_project
		)
	{
		$this->survey_project = $survey_project;
	}
	
	/**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$obj_survey_project = $this->survey_project
    	->where('str_text', 'publish')
    	->first();
    	
    	DB::table('survey_questions')->delete();
    	Survey_question::create(array(
    			'survey_project_id'     => $obj_survey_project->id,
    			'str_name' => 'genre',
    			'str_text' => 'What is the genre of your book?',
    			'str_prev' => '',
    			'str_next' => 'schedule',
    			'bool_include' => 1,
    			'bool_multiple_responses' => 0,
    			'bool_two_columns' => 1,
    			'bool_first' => 1,
    			'bool_last' => 0
    	));
    	
    	Survey_question::create(array(
    			'survey_project_id'     => $obj_survey_project->id,
    			'str_name' => 'schedule',
    			'str_text' => 'When do you anticipate that you will finish writing your book?',
    			'str_prev' => 'genre',
    			'str_next' => 'format',
    			'bool_include' => 1,
    			'bool_multiple_responses' => 0,
    			'bool_two_columns' => 0,
    			'bool_first' => 0,
    			'bool_last' => 0
    	));
    	
    	Survey_question::create(array(
    			'survey_project_id'     => $obj_survey_project->id,
    			'str_name' => 'format',
    			'str_text' => 'In which format(s) is your book available?',
    			'str_prev' => 'schedule',
    			'str_next' => 'length',
    			'bool_include' => 1,
    			'bool_multiple_responses' => 1,
    			'bool_two_columns' => 0,
    			'bool_first' => 0,
    			'bool_last' => 0
    	));

    	Survey_question::create(array(
    	'survey_project_id'     => $obj_survey_project->id,
    	'str_name' => 'format',
    	'str_text' => 'In which format(s) is your book available?',
    	'str_prev' => 'schedule',
    	'str_next' => 'length',
    	'bool_include' => 1,
    	'bool_multiple_responses' => 1,
    	'bool_two_columns' => 0,
    	'bool_first' => 0,
    	'bool_last' => 0
    	));

    	Survey_question::create(array(
    	'survey_project_id'     => $obj_survey_project->id,
    	'str_name' => 'length',
    	'str_text' => 'Please choose the appropriate length.  If you know the word count, choose the word count',
    	'str_prev' => 'format',
    	'str_next' => 'experience',
    	'bool_include' => 1,
    	'bool_multiple_responses' => 0,
    	'bool_two_columns' => 0,
    	'bool_first' => 0,
    	'bool_last' => 0
    	));

    	Survey_question::create(array(
    	'survey_project_id'     => $obj_survey_project->id,
    	'str_name' => 'experience',
    	'str_text' => 'Have you been published before?',
    	'str_prev' => 'length',
    	'str_next' => 'contact_time',
    	'bool_include' => 1,
    	'bool_multiple_responses' => 0,
    	'bool_two_columns' => 0,
    	'bool_first' => 0,
    	'bool_last' => 0
    	));
    	 
    	Survey_question::create(array(
    			'survey_project_id'     => $obj_survey_project->id,
    			'str_name' => 'contact_time',
    			'str_text' => 'When is the best time of day to discuss your book?',
    			'str_prev' => 'experience',
    			'str_next' => 'age',
    			'bool_include' => 1,
    			'bool_multiple_responses' => 0,
    			'bool_two_columns' => 0,
    			'bool_first' => 0,
    			'bool_last' => 0
    	));
    	
    	Survey_question::create(array(
    			'survey_project_id'     => $obj_survey_project->id,
    			'str_name' => 'age',
    			'str_text' => 'Are you at least 18 years old?',
    			'str_prev' => 'contact_time',
    			'str_next' => 'author_info',
    			'bool_include' => 1,
    			'bool_multiple_responses' => 0,
    			'bool_two_columns' => 0,
    			'bool_first' => 0,
    			'bool_last' => 0
    	));
    	
    	Survey_question::create(array(
    			'survey_project_id'     => $obj_survey_project->id,
    			'str_name' => 'author_info',
    			'str_text' => 'Please tell us a little bit about you',
    			'str_prev' => 'age',
    			'str_next' => 'author_info_two',
    			'bool_include' => 1,
    			'bool_multiple_responses' => 0,
    			'bool_two_columns' => 0,
    			'bool_first' => 0,
    			'bool_last' => 0
    	));
    	
    	Survey_question::create(array(
    			'survey_project_id'     => $obj_survey_project->id,
    			'str_name' => 'author_info_two',
    			'str_text' => 'Please tell us a little more about you',
    			'str_prev' => 'author_info',
    			'str_next' => '',
    			'bool_include' => 1,
    			'bool_multiple_responses' => 0,
    			'bool_two_columns' => 0,
    			'bool_first' => 0,
    			'bool_last' => 1
    	));
    	
    	 
        //
    }
}
