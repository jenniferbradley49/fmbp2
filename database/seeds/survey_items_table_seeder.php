<?php

use Illuminate\Database\Seeder;
use App\Models\Survey_item;
use App\Models\Survey_question;

class survey_items_table_seeder extends Seeder
{

	var $survey_question;
	
	public function __construct(
			Survey_question $survey_question
	)
	{
		$this->survey_question = $survey_question;
	}
	
	
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$obj_survey_question = $this->survey_question
    	->where('str_name', 'genre')
    	->first();
    	
    	DB::table('survey_items')->delete();

    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 100,
    	'str_text' => 'Art'
    	));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 110,
    	'str_text' => 'Biography/memoir'
    	));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 120,
    	'str_text' => 'Business'
    	));
    	 
    	    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 130,
    	'str_text' => "Children's"
    	));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 140,
    	'str_text' => 'Cooking'
    	));
    	 

    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 150,
    	'str_text' => 'Faith'
    	));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 160,
    	'str_text' => 'Fiction - romance'
    	));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 170,
    	'str_text' => 'Fiction - Science fiction'
    	));
    	 
    	    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 180,
    	'str_text' => 'Fiction - horror'
    	));

    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 190,
    	'str_text' => 'Fiction - mystery'
    	    ));
    	    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 200,
    	'str_text' => 'Fiction - other'
    	));
    	 

    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 210,
    	'str_text' => 'Health'
    	));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 220,
    	'str_text' => 'History'
    	));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 230,
    	'str_text' => 'Hobby'
    	));
    	 
    	    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 240,
    	'str_text' => 'Humor/comedy'
    	));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 250,
    	'str_text' => 'Other'
    	));
    	 

    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 260,
    	'str_text' => 'Photography'
    	));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 270,
    	'str_text' => 'Poetry'
    	));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 280,
    	'str_text' => 'Religion'
    	));
    	 
    	    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 290,
    	'str_text' => 'Self help'
    	));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 300,
    	'str_text' => 'Sports'
    	));

    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 310,
    	'str_text' => 'Travel'
    			));

// start contact time    	
    	$obj_survey_question = $this->survey_question
    	->where('str_name', 'contact_time')
    	->first();
    	 
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 100,
    	'str_text' => 'Mornings'
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 110,
    	'str_text' => 'Afternoons'
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 120,
    	'str_text' => 'Evenings'
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 130,
    	'str_text' => 'Anytime'
    			));

    	// start schedule
    	$obj_survey_question = $this->survey_question
    	->where('str_name', 'schedule')
    	->first();
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 100,
    	'str_text' => 'My book is ready now'
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 110,
    	'str_text' => 'Finished writing - need to edit'
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 120,
    	'str_text' => 'Less than one month'
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 130,
    	'str_text' => 'One to three months'
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 140,
    	'str_text' => 'Four to Six months'
    			));

    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 150,
    	'str_text' => 'Six to twelve months'
    			));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 160,
    	'str_text' => 'More than one year'
    			));

    // start format	
    	$obj_survey_question = $this->survey_question
    	->where('str_name', 'format')
    	->first();
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 100,
    	'str_mult_resps_id' => 'int_format_mw',
    	'str_text' => 'Microsoft Word'
    			));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 110,
    	'str_mult_resps_id' => 'int_format_pd',
    	'str_text' => 'Microsoft Wordpad'
    			));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 120,
    	'str_mult_resps_id' => 'int_format_ws',
    	'str_text' => 'Microsoft Works'
    			));
    	 

    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 130,
    	'str_mult_resps_id' => 'int_format_np',
    	'str_text' => 'Microsoft Notepad'
    			));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 140,
    	'str_mult_resps_id' => 'int_format_ap',
    	'str_text' => 'Apple Pages'
    			));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 150,
    	'str_mult_resps_id' => 'int_format_hw',
    	'str_text' => 'Handwritten'
    			));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 160,
    	'str_mult_resps_id' => 'int_format_tw',
    	'str_text' => 'Typewritten on paper'
    			));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 170,
    	'str_mult_resps_id' => 'int_format_or',
    	'str_text' => 'Other'
    			));

// age questions
    	$obj_survey_question = $this->survey_question
    	->where('str_name', 'age')
    	->first();
    	 
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 100,
    	'str_text' => 'Yes, I am at least 18'
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 110,
    	'str_text' => 'No, I have less than 18 years'
    			));
    	

    	// length questions
    	$obj_survey_question = $this->survey_question
    	->where('str_name', 'length')
    	->first();
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 100,
    	'str_text' => 'less than 1000 words'
    			));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 110,
    	'str_text' => '1000 to 9,999'
    			));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 120,
    	'str_text' => '10,000 to 24,999'
    			));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 130,
    	'str_text' => '25,000 to 49,999'
    			));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 150,
    	'str_text' => '50,000 to 74,999'
    			));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 160,
    	'str_text' => '75,009 to 99,999'
    			));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 170,
    	'str_text' => '100,000 or more'
    			));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 180,
    	'str_text' => 'less than 10 pages'
    			));

    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 190,
    	'str_text' => '10 to 49 pages'
    			));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 200,
    	'str_text' => '50 to 99 pages'
    			));
    	 

    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 210,
    	'str_text' => '100 to 199 pages'
    			));

    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 220,
    	'str_text' => '200 or more pages'
    			));
    	

    	// experience questions
    	$obj_survey_question = $this->survey_question
    	->where('str_name', 'experience')
    	->first();
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 100,
    	'str_text' => 'No'
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 110,
    	'str_text' => 'Yes, with less than 500 copies sold'
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 120,
    	'str_text' => 'Yes, with 500 to 999 copies sold'
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 130,
    	'str_text' => 'Yes, with 1000 to 4,999 copies sold'
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 150,
    	'str_text' => 'Yes, with 5000 to 9,999 copies sold'
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'int_order' => 160,
    	'str_text' => 'Yes, with 10,000 or more copies sold'
    			));
    	 
    	
    	 
    	// author_info questions
    	$obj_survey_question = $this->survey_question
    	->where('str_name', 'author_info')
    	->first();
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => 'str_first_name'
    			));
    	
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => 'str_last_name'
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => 'str_telephone_ac'
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => 'str_telephone_two'
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => 'str_telephone_three'
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => 'str_email'
    			));
/*    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));

    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	 
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));

    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));

    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
    	
    	Survey_item::create(array(
    	'survey_question_id'     => $obj_survey_question->id,
    	'bool_include' => 1,
    	'str_text' => ''
    			));
  */  	 
    	//
    }
}
