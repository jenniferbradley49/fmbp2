<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Ajax;
use App\Models\Author;
use Session;

class AjaxController extends Controller
{
    
    public function post_set_item(
    		Request $request,
    		Ajax $ajax,
    		Author $author )
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
    
	}
