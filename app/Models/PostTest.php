<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// organization
// 1. get validation, alphabet
// 1.5 get validation messges
// 2. get request array
// 3. get data array
// 4. get data array for get functions
// 5. unclassified

class PostTest extends Model
{
	// copied from pubhelp, in which everything is test_post
	protected $table = 'test_posts';
	
	public function getRequestArrayTestPost($request)
	{
		return array(
		//    			'str_lead_destination' => $request->str_lead_destination,
				'str_lead_destination_tested' => $request->str_lead_destination_tested,
				//    			'int_client_id' => $request->int_client_id,
				'str_test_id' => $request->str_test_id
		);
	}
	

	public function getDataArrayTestPost(
			$page_heading_content,
			$arr_request,
			$test_post)
//			$arr_logged_in_user
	
			// fix time zone
	{
		$arr_test_post = array();
		foreach ($test_post as $line)
		{
			$arr_test_post['str_lead_destination_tested'] = $line->str_lead_destination_tested;
			$arr_test_post['str_test_id'] = $line->str_test_id;
			$corrected_time_zone = $line->created_at->copy()->tz(Auth::user()->timezone)->format('M j, Y \\a\\t g:i A');
			$arr_test_post['created_at'] = $corrected_time_zone;
	
		}
		//    	echo "str_lead_destination = ". $obj_client->str_lead_destination . "<br>";
		return array(
				'page_heading_content' => $page_heading_content,
				'test_post' => $test_post,
				//    			'str_lead_destination' => $obj_client->str_lead_destination,
				//    			'str_lead_destination_last' => Input::old('str_lead_destination_tested', 'not yet populated'),
				'str_lead_destination_tested' => (!isset($arr_request['str_lead_destination_tested']))?'':$arr_request['str_lead_destination_tested'],
				//   			'str_company' => $obj_client->str_company,
				'str_test_id' => (!isset($arr_request['str_test_id']))?'':$arr_request['str_test_id'],
				//			('', 'test 1'),
//				'arr_logged_in_user' => $arr_logged_in_user,
	
		);
	
	}
	
	public function getDataArrayGetPostTest(
			$page_heading_content
			)
	{
		return array(
				'page_heading_content' => $page_heading_content				 
		);
	
	}
	
	
    //
}
