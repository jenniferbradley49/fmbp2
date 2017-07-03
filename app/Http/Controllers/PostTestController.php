<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostTest;
use App\Models\Role;
use App\Models\Role_user;
use App\Classes\RoleHelper;
use Auth;


use App\Http\Requests;

class PostTestController extends Controller
{
	var $obj_logged_in_user;
	var $arr_logged_in_user;
	var $bool_has_role;
	var $roleHelper;
	//organization of function
	// 1. __construct
	// get, alphabetically
	// post, alphabetically
	
	public function __construct(
			Role_user $role_user, RoleHelper $roleHelper)
	{
		//		$this->middleware('three_step:admin');
		//		$this->middleware('three_step');
	
		$this->middleware('auth');
		if (Auth::check())
		{
			$this->middleware('role:admin');
			$this->obj_logged_in_user = Auth::user();
			$this->arr_logged_in_user = $roleHelper->prepare_logged_in_user_info($this->obj_logged_in_user);
	
		}  // end if Auth::check()
	
	} // end __construct function
	
	
	
	public function get_post_test(
//			Client $client,
//			Admin $admin,
			PostTest $postTest,
			Request $request)
	{
		$page_heading_content = "Test a post request";
//		$obj_client = $client->where('user_id', $request->client_user_id)->first();
//		if (is_null($obj_client))
//			echo "no client found for this user";
		//    	else
		//   	{
		//   		$arr_client = $admin->getClientData($obj_client);
			//   	}
			//    	$arr_states = $state->get_states();
	
		$data = $postTest->getDataArrayGetPostTest(
					$page_heading_content
//					null, // this is where the currect lead destination being tested goes in the post version
//					$obj_client,
//					$this->arr_logged_in_user
				);
			//   	echo "admin controller, line 78";
			//   	echo "<pre>";
			//   	print_r($data);
			//   	echo "</pre>";
			return view('public/post_test')->with('data', $data);
	}
	

	public function post_post_test(
//			Admin $admin,
			PostTest $test_post,
			Request $request) 

			 		// copied from pubhelp/adminController, in which everythig 
			 		// is test_post, not post test
			 		// 		CloakedClientId $cloakedClientId)
	{
		//    	$validation_rules = $admin->getValidationRulesTestClient();
		//    	$this->validate($request, $validation_rules);
		$arr_request = $test_post->getRequestArrayTestPost($request);
		// this function was copied from three step, client info not necessary here
		// use publisher as client
		//    	$client->cloaked_client_id = $client->getNewCloakedClientId($user->id);
		 
		 
		//   	$obj_client = $client->where('id', $request->int_client_id)->first();
		// next three lines record page load
		$test_post->str_lead_destination_tested = $arr_request['str_lead_destination_tested'];
		$test_post->str_test_id = $arr_request['str_test_id'];
		$test_post->save();
		$test_post = $test_post->orderBy('created_at', 'asc')->get();
	
		 
		 
		$page_heading_content = "Test a post request results";
	
		$data = $test_post->getDataArrayTestPost(
				$page_heading_content,
				$arr_request,
				$test_post);	
	//			$this->arr_logged_in_user
		return view('public/post_test_results')->with('data', $data);
	}
	
	
    //
}
