<?php

use Illuminate\Database\Seeder;

class survey_questionsTableSeeder extends Seeder
{
	
	var $survey_questions;
	
	public function __construct(
			Survey_questions $survey_questions
		)
	{
		$this->survey_questions = $survey_questions;
	}
	
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$obj_survey_questions = $this->survey_questions
			->survey_project
			->where('str_text', 'publish')
			->first();

		$this->survey_questions->delete();
		$this->survey_questions->create(array(
			'survey_project_id'     => $obj_survey_questions->survey_project_id,
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
		
		$this->survey_questions->create(array(
				'survey_project_id'     => $obj_survey_questions->survey_project_id,
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
		
		$this->survey_questions->create(array(
				'survey_project_id'     => $obj_survey_questions->survey_project_id,
				'str_name' => 'format',
				'str_text' => 'In which format(s) is your book available?',
				'str_prev' => 'schedule',
				'str_next' => 'contact_time',
				'bool_include' => 1,
				'bool_multiple_responses' => 1,
				'bool_two_columns' => 0,
				'bool_first' => 0,
				'bool_last' => 0
		));
		
		$this->survey_questions->create(array(
				'survey_project_id'     => $obj_survey_questions->survey_project_id,
				'str_name' => 'contact_time',
				'str_text' => 'When is the best time of day to discuss your book?',
				'str_prev' => 'format',
				'str_next' => 'age',
				'bool_include' => 1,
				'bool_multiple_responses' => 0,
				'bool_two_columns' => 0,
				'bool_first' => 0,
				'bool_last' => 0
		));
		
		$this->survey_questions->create(array(
				'survey_project_id'     => $obj_survey_questions->survey_project_id,
				'str_name' => 'age',
				'str_text' => 'Are you at least 18 years old?',
				'str_prev' => 'contact_time',
				'str_next' => 'address_one',
				'bool_include' => 1,
				'bool_multiple_responses' => 0,
				'bool_two_columns' => 0,
				'bool_first' => 0,
				'bool_last' => 0
		));
		
		$this->survey_questions->create(array(
				'survey_project_id'     => $obj_survey_questions->survey_project_id,
				'str_name' => 'address_one',
				'str_text' => 'Please tell us a little bit about you',
				'str_prev' => 'age',
				'str_next' => 'address_two',
				'bool_include' => 1,
				'bool_multiple_responses' => 0,
				'bool_two_columns' => 0,
				'bool_first' => 0,
				'bool_last' => 0
		));
		
		$this->survey_questions->create(array(
				'survey_project_id'     => $obj_survey_questions->survey_project_id,
				'str_name' => 'address_two',
				'str_text' => 'Please tell us a little more about you',
				'str_prev' => 'addres_one',
				'str_next' => '',
				'bool_include' => 1,
				'bool_multiple_responses' => 0,
				'bool_two_columns' => 0,
				'bool_first' => 0,
				'bool_last' => 1
		));
		
		
		
    }
}
