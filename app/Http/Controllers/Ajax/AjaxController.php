<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Survey_question;
use App\Models\Ajax;

class AjaxController extends Controller
{
    
    public function post_set_item(
    		Request $request,
    		Ajax $ajax,
    		Author $author			
     )
//    		CommonCode $cCode)
   // 		CloakedClientId $cloakedClientId)
    {
    	
//    	$validation_rules = $ajax->getValidationRules('q1');
//    	$this->validate($request, $validation_rules);

    	// experience shows this is not persistent, secondary session id 
    	// created to persistn
    	$session_id = Session::getId();
    	
    	$arr_request = $ajax->getRequestArray($request);
    	
		$manual_validate = $ajax->manual_validate_item($arr_request);
		if ($manual_validate < 0)
		{
			$arr_response = array('response' => $manual_validate);
			return response()->json($arr_response);
		}	
		
// on localhost, the app generates a new session id on each reload
// try on live server
// following live commented out
// replaced by next two lines for locahost only
 //   	$obj_author = $author->where('session_id', $session_id)->first();
		$obj_author = $author;
    	$obj_author->session_id = $session_id;
		// if no current record for this user found
    	if ($obj_author == null)
    	{
    		$obj_author = $author;
    		$obj_author->session_id = $session_id;
    	}
		$obj_author->$arr_request['item_name'] = $arr_request['item_value'];
		$obj_author->save();
		$arr_response = array('response' => '1');
		return response()->json($arr_response);
		
    }

    public function post_get_question(
    		Request $request,
    		Ajax $ajax,
    		Survey_question $survey_question )
    		//    		CommonCode $cCode)
    // 		CloakedClientId $cloakedClientId)
    {
    	 
    	//    	$validation_rules = $ajax->getValidationRules('q1');
    	//    	$this->validate($request, $validation_rules);
    
    	// experience shows this is not persistent, secondary session id
    	// created to persistn
 //   	$session_id = Session::getId();
    	 
//    	$arr_request = $ajax->getRequestArrayGetGenre($request);
    	 
 //   	$manual_validate = $ajax->manual_validate_item($arr_request);
//    	if ($manual_validate < 0)
//    	{
//    		$arr_response = array('response' => $manual_validate);
//    		return response()->json($arr_response);
 //   	}
    
    	// on localhost, the app generates a new session id on each reload
    	// try on live server
    	// following live commented out
    	// replaced by next two lines for locahost only
    	//   	$obj_author = $author->where('session_id', $session_id)->first();
//    	$survey_question_id = $survey_item->survey_questions()
//    		->where(str_name, 'genre')
//    		->first()
//    		->id;
    	$survey_question = $survey_question
    	->where('str_name', $request->question_name)
    	->first();
    	
//    	echo "<pre>";
//    	print_r($survey_question);
//    	echo "</pre>";
    	 
		$survey_items = $survey_question
			->where('str_name', $request->question_name)
			->first()
			->survey_items;

		// convert to formatted array
		$arr_items = array();
		foreach($survey_items as $item)
		{
			if ($item->bool_include)
			{
				$temp = array();
				$temp['str_text'] = $item->str_text;
				$temp['survey_question_id'] = $item->survey_question_id;
				$temp['id'] = $item->id;
				$arr_items[] = $temp;
			}
		}
		
		if ($survey_question->bool_two_columns)
		{
			$arr_two_cols = array();				
			$int_arr_items_length = count($arr_items);
			$mod_two_arr_items_length = $int_arr_items_length % 2;
			$int_row = 0;
			$bool_first = 1;
			$int_rows_required = ($int_arr_items_length / 2) + $mod_two_arr_items_length;
			
			for ($i = 0; $i < $int_arr_items_length; $i++)
			{
				if ($bool_first)
				{
					$arr_two_cols[$int_row]['first'] = $arr_items[$i];
					$int_row ++;
					if ($int_row >= $int_rows_required)
					{
						$bool_first = 0;
						$int_row = 0;
					}
							
				}
				else 
				{
					$arr_two_cols[$int_row]['second'] = $arr_items[$i];
					$int_row ++;
						
				}
			}

			$data = $ajax->getDataArrayGetQuestionTwoCols($survey_question, $arr_two_cols);
    		return view('ajax/two_cols_one_response')->with("data", $data)->render();
		} // if bool two cols
		else
		{
			$data = $ajax->getDataArrayGetQuestionOneCol($survey_question, $arr_items);
			return view('ajax/one_col_one_response')->with("data", $data)->render();
		}
    
    }
    
    
	}
