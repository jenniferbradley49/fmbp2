<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ajax extends Model
{
	var $arr_acceptable_names;
	
	public function __construct()
	{
		$this->arr_acceptable_names = array(0 => 'genre', 1 => 'timeframe');
	}

	public function getRequestArray($request)
	{
		return array(
				'item_name' => $request->item_name,
				'item_value' => $request->item_value
		);
	}
	
    public function manual_validate_item($arr_request)
    {
    	if (empty($arr_request['item_name']))
    		return -1;
    	if (empty($arr_request['item_value']))
    		return -2;
    	if (!in_array($arr_request['item_name'], $this->arr_acceptable_names))
    		return -3;
    	return 1;
    	//still need to validate values
    }
/*    
    public function getDataArrayGetQuestionTwoCols($survey_question, $arr_two_cols)
    {
    	$arr_data = array();
    	$arr_data['survey_question'] = $survey_question;
    	$arr_data['arr_two_cols'] = $arr_two_cols;
    	return $arr_data;
    }

    public function getDataArrayGetQuestionOneCol($question_text, $arr_content)
    {
    	$arr_data = array();
    	$arr_data['question_text'] = $question_text;
    	$arr_data['arr_content'] = $arr_content;
    	return $arr_data;
    }
 */   
}
