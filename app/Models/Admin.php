<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Auth;
//use Hash;

// organization
// 1. get validation, alphabet
// 1.5 get balifation messges
// 2. get request array
// 3. get data array
// 4. get data array for get functions
// 5. unclassified
class Admin extends Model
{
    public function getValidationRules()
    {
    	return array(
    			'first_name' => 'required|max:50',
    			'last_name' => 'required|max:50',
 //   			'company' => 'required|max:50',
    			'email' => 'required|email|max:50|unique:users',
    			'password' => 'required|confirmed|max:50|min:6'
    	);
    }
    

    public function getValidationRulesAddClient()
    {
    	return array(
    			'client_user_id' => 'integer|exists:users,id',
    			'str_email_two' => 'email|max:60',
    			'str_website' => 'required|url|max:60',
    			'bool_delivery_crm' => 'required|integer|min:0|max:1',
    			'str_email_delivery' => 'email|max:60',
    			'str_crm' => 'alphanum|max:30',
    			'str_crm_url' => 'url|max:60',
    			'str_lead_destination' => 'url|max:60',
    			'str_first_name' => 'required|max:40',
    			'str_last_name' => 'required|max:40',
    			'str_telephone_one' => 'required|max:20',
    			'str_telephone_two' => 'max:20',
    			'str_company' => 'max:40',
    			'str_city' => 'required|max:40',
    			'str_zip' => 'required|max:15',
    			'int_state_id' => 'required|integer|exists:states,id',
    			'bool_active' => 'integer|min:0|max:1',
    			'bool_confirmed' => 'integer|min:0|max:1'
    			
//    			'' => 'required|url',
    			 
    			
    	);
    }
    
    public function getValidationRulesAddClientDO()
    {
    	return array(
    			'bool_delivery_crm' => 'required|integer|min:0|max:1'    			 
    	);
    }
    
  // this is used if the client wants delivery by email  
    public function getValidationRulesAddClientEmail()
    {
    	return array(
    			'client_user_id' => 'integer|exists:users,id',
    			'str_email_two' => 'email|max:60',
    			'str_website' => 'required|url|max:60',
//    			'bool_delivery_crm' => 'required|integer|min:0|max:1',
    			'str_email_delivery' => 'email|max:60',
 //   			'str_crm' => 'alphanum|max:30',
 //   			'str_crm_url' => 'url|max:60',
//    			'str_lead_destination' => 'url|max:60',
    			'str_first_name' => 'required|max:40',
    			'str_last_name' => 'required|max:40',
    			'str_telephone' => 'required|max:20',
//    			'str_telephone_two' => 'max:20',
    			'str_company' => 'max:40',
    			'str_city' => 'required|max:40',
    			'str_zip' => 'required|max:15',
    			'int_state_id' => 'required|integer|exists:states,id',
    			'bool_active' => 'integer|min:0|max:1',
    			'bool_confirmed' => 'integer|min:0|max:1'
    
    			//    			'' => 'required|url',
    
    			 
    	);
    }
    
// this is used if the client wants delivery by CRM
    public function getValidationRulesAddClientCRM()
    {
    	return array(
    			'client_user_id' => 'integer|exists:users,id',
    			'str_email_two' => 'email|max:60',
    			'str_website' => 'required|url|max:60',
    			//    			'bool_delivery_crm' => 'required|integer|min:0|max:1',
//   			'str_email_delivery' => 'email|max:60',
       			'str_crm' => 'alphanum|max:30',
       			'str_crm_url' => 'url|max:60',
       			'str_lead_destination' => 'url|max:60',
    			'str_first_name' => 'required|max:40',
    			'str_last_name' => 'required|max:40',
    			'str_telephone' => 'required|max:20',
//    			'str_telephone_two' => 'max:20',
    			'str_company' => 'max:40',
    			'str_city' => 'required|max:40',
    			'str_zip' => 'required|max:15',
    			'int_state_id' => 'required|integer|exists:states,id',
    			'bool_active' => 'integer|min:0|max:1',
    			'bool_confirmed' => 'integer|min:0|max:1'
    
    			//    			'' => 'required|url',
    
    
    	);
    }
    
    
    
    public function getValidationRulesAddRole()
    {
    	return array(
    			'user_id' => 'required|integer|min:1',
    			'role_id' => 'required|integer|min:1',
    	);
    }
    
    
    public function getValidationRulesAddSI()
    {
    	return array(
    			'id' => 'integer|exists:survey_items,survey_question_id',
    			'str_text' => 'required|max:50',
    			'bool_include' => 'integer|min:1|max:1'
    	);
    }

    public function getValidationRulesAddSP()
    {
    	return array(
    	//   			'str_name' => 'required|max:50',
    			'str_text' => 'required|max:50'
        	);
    }
    
    
    
    public function getValidationRulesAddSQ()
    {
    	return array(
    			'id' => 'integer|exists:survey_questions,survey_project_id',
    			'str_name' => 'required|max:50',
    			'str_text' => 'required|max:50',
    			'bool_include' => 'integer|min:1|max:1',
    			'bool_multiple_responses' => 'integer|min:1|max:1',
    			'bool_two_columns' => 'integer|min:1|max:1'
    	);
    }
    

    public function getValidationRulesChooseClient()
    {
    	return array(
    			'client_id' => 'required|integer|exists:clients,user_id'
    	);
    }
    
    
    public function getValidationRulesChooseSI()
    {
    	return array(
    			'int_survey_item_id' => 'required|integer|exists:survey_items,id'
    	);
    }
    

    public function getValidationRulesChooseSP()
    {
    	return array(
    			'int_survey_project_id' => 'required|integer|exists:survey_projects,id',
    			'str_choice' => 'required'
    	);
    }
    
    
    public function getValidationRulesChooseSQ()
    {
    	return array(
    			'survey_question_id' => 'required|integer|exists:survey_questions,id',
    			'str_choice' => 'required'    			
    	);
    }
    

    public function getValidationRulesChooseUser()
    {
    	return array(
    			'client_user_id' => 'required|integer|exists:users,id'
    	);
    }
    
    
    public function getValidationRulesEditSI()
    {
    	return array(
    			'id' => 'required|integer|exists:survey_items,id',
    			'str_text' => 'required|max:100',
    			'bool_include' => 'required|integer|min:0|max:1'
    	);
    }

    public function getValidationRulesEditSP()
    {
    	return array(
    			'id' => 'required|integer|exists:survey_projects,id',
    			'str_text' => 'required|max:100'
    	);
    }
    
    
    public function getValidationRulesEditSQ()
    {
    	return array(
    			'id' => 'integer|exists:survey_questions,id',
    			'str_name' => 'required|max:50',
    			'str_text' => 'required|max:50',
    			'bool_include' => 'integer|min:1|max:1',
    			'bool_multiple_responses' => 'integer|min:1|max:1',
    			'bool_two_columns' => 'integer|min:1|max:1'
    	);
    }
    
    
    
    public function getValidationRulesEditUser()
    {
    	return array(
    		'user_id' => 'required|integer|min:1',
    		'first_name' => 'required|max:50',
    		'last_name' => 'required|max:50'
//    		'company' => 'required|max:50'
    	);
    }
    
    
    public function getValidationMessagesEditUser()
    {
    	return array(
    		'user_id.min' => 'Please choose a user in the drop down box.  The current choice of &quot;Please choose a user&quot; is not acceptable.',
    	);
    }
    

    public function getValidationRulesTestClient()
    {
    	return array(
    			'str_lead_destination_tested' => 'url|max:60',
    			'int_client_id' => 'required|integer|exists:clients,id',
    			'str_test_id' => 'required|max:40'
    
    			//    			'' => 'required|url',
    
    			 
    	);
    }
    
    
    
    public function getRequestArray($request)
    {
    	return array(
    		'first_name' => $request->first_name,
    		'last_name' => $request->last_name,
//    		'company' => $request->company,
    		'email'    => $request->email,
    		'password' => \Hash::make($request->password)
    	);
    }

/*
    public function getRequestArrayAddClient($request)
    {
//    echo "in admin, getRequestArrayAddClient, client_user_id = $request->client_user_id";	
//echo "<br>";
    	return array(
    			'client_user_id' => $request->client_user_id,
    			'survey_project_id' => $request->int_survey_project_id,
    			'str_email_two' => $request->str_email_two,
    			'str_website' => $request->str_website,
    			'bool_delivery_crm' => (is_null($request->bool_delivery_crm))?0:1,
    			'str_email_delivery' => $request->str_email_delivery,
    			'str_crm' => $request->str_crm,
    			'str_crm_url' => $request->str_crm_url,
    			'str_lead_destination' => $request->str_lead_destination,
    			'str_first_name' => $request->str_first_name,
    			'str_last_name' => $request->str_last_name,
    			'str_telephone_one' => $request->str_telephone_one,
    			'str_telephone_two' => $request->str_telephone_two,
    			'str_company' => $request->str_company,
    			'str_city' => $request->str_city,
    			'str_zip' => $request->str_zip,
    			'int_state_id' => $request->int_state_id,
    			'bool_active' => (is_null($request->bool_active))?0:(int)$request->bool_active,
    			'bool_confirmed' => (is_null($request->bool_confirmed))?0:(int)$request->bool_confirmed,
    	);
    }
*/    

    public function getRequestArrayAddClientEmail($request)
    {
    	$bool_delivery_crm = (int)$request->bool_delivery_crm;
    	$bool_delivery_crm = ($bool_delivery_crm == 1)?1:0;
    	$bool_active = (int)$request->bool_active;
    	$bool_active = ($bool_active == 1)?1:0;
    	$bool_confirmed = (int)$request->bool_confirmed;
    	$bool_confirmed = ($bool_confirmed == 1)?1:0;
    	 
    	return array(
    			'client_user_id' => $request->client_user_id,
    			'survey_project_id' => $request->int_survey_project_id,
    			'str_email_two' => $request->str_email_two,
    			'str_website' => $request->str_website,
    			'bool_delivery_crm' => $bool_delivery_crm,
    			'str_email_delivery' => $request->str_email_delivery,
//    			'str_crm' => $request->str_crm,
//    			'str_crm_url' => $request->str_crm_url,
//    			'str_lead_destination' => $request->str_lead_destination,
    			'str_first_name' => $request->str_first_name,
    			'str_last_name' => $request->str_last_name,
    			'str_telephone' => $request->str_telephone,
 //       		'str_telephone_two' => $request->str_telephone_two,
        		'str_company' => $request->str_company,
        		'str_city' => $request->str_city,
        		'str_zip' => $request->str_zip,
        		'int_state_id' => $request->int_state_id,
        		'bool_active' => $bool_active,
        		'bool_confirmed' => $bool_confirmed,
        	);
    }
    

    public function getRequestArrayAddClientCRM($request)
    {
    	$bool_delivery_crm = (int)$request->bool_delivery_crm;
    	$bool_delivery_crm = ($bool_delivery_crm == 1)?1:0;
    	$bool_active = (int)$request->bool_active;
    	$bool_active = ($bool_active == 1)?1:0;
    	$bool_confirmed = (int)$request->bool_confirmed;
    	$bool_confirmed = ($bool_confirmed == 1)?1:0;
    	 
    	return array(
    			'client_user_id' => $request->client_user_id,
    			'survey_project_id' => $request->int_survey_project_id,
    			'str_email_two' => $request->str_email_two,
    			'str_website' => $request->str_website,
    			'bool_delivery_crm' => $bool_delivery_crm,
//    			'str_email_delivery' => $request->str_email_delivery,
       			'str_crm' => $request->str_crm,
       			'str_crm_url' => $request->str_crm_url,
       			'str_lead_destination' => $request->str_lead_destination,
    			'str_first_name' => $request->str_first_name,
    			'str_last_name' => $request->str_last_name,
    			'str_telephone' => $request->str_telephone,
//    			'str_telephone_two' => $request->str_telephone_two,
    			'str_company' => $request->str_company,
    			'str_city' => $request->str_city,
    			'str_zip' => $request->str_zip,
    			'int_state_id' => $request->int_state_id,
    			'bool_active' => $bool_active,
    			'bool_confirmed' => $bool_confirmed,
    	);
    }
    
    
    
    
    public function getRequestArrayAddRole($request)
    {
    	return array(
 		   	'user_id'	=> $request->user_id,
	    	'role_id' 	=> $request->role_id
       	);
    }
    
    public function getRequestArrayAddSI($request)
    {
    	// fix checkbox null if not checked
    	 
    	return array(
    			'survey_question_id'	=> $request->id,
    			'str_mult_resps_id' 	=> $request->str_mult_resps_id,
    			'str_text' 	=> $request->str_text,
    			'bool_include' 	=> ($request->bool_include == 1 ? 1:0)
    	);
    }
    
    
    public function getRequestArrayAddSP($request)
    {
    	// fix checkbox null if not checked
       
    	return array(
 //   			'str_name'	=> $request->str_name,
    			'str_text' 	=> $request->str_text
    	);
    }

    public function getRequestArrayAddSQ($request)
    {
    	// fix checkbox null if not checked
    	 
    	return array(
    			'survey_project_id'	=> $request->id,
    			'str_name'	=> $request->str_name,
    			'str_text' 	=> $request->str_text,
    			'str_next'	=> $request->str_next,
    			'str_prev' 	=> $request->str_prev,
    			'bool_include' 	=> ($request->bool_include == 1 ? 1:0),
    			'bool_multiple_responses' 	=> ($request->bool_multiple_responses == 1 ? 1:0),
    			'bool_two_columns' 	=> ($request->bool_two_columns == 1 ? 1:0),
    			'bool_first' 	=> ($request->bool_first == 1 ? 1:0),
    			'bool_last' 	=> ($request->bool_last == 1 ? 1:0)
    	);
    }
    

    public function getRequestArrayEditSI($request)
    {
    	// fix checkbox null if not checked
    
    	return array(
    			'survey_item_id'	=> $request->id,
    			'str_mult_resps_id' 	=> $request->str_mult_resps_id,
    			'str_text' 	=> $request->str_text,
    			'bool_include' 	=> ($request->bool_include == 1 ? 1:0)
    	);
    }

    public function getRequestArrayEditSP($request)
    {
    	// fix checkbox null if not checked
    
    	return array(
    			'survey_project_id'	=> $request->id,
    			'str_text' 	=> $request->str_text,
    	);
    }
    
    
    
    public function getRequestArrayEditSQ($request)
    {
    	// fix checkbox null if not checked
    
    	return array(
    			'survey_question_id'	=> $request->id,
    			'str_name'	=> $request->str_name,
    			'str_text' 	=> $request->str_text,
    			'str_next'	=> $request->str_next,
    			'str_prev' 	=> $request->str_prev,
    			'bool_include' 	=> ($request->bool_include == 1 ? 1:0),
    			'bool_multiple_responses' 	=> ($request->bool_multiple_responses == 1 ? 1:0),
    			'bool_two_columns' 	=> ($request->bool_two_columns == 1 ? 1:0),
    			'bool_first' 	=> ($request->bool_first == 1 ? 1:0),
    			'bool_last' 	=> ($request->bool_last == 1 ? 1:0)
    	);
    }
    
    
    public function getRequestArrayTestClient($request)
    {
    	return array(
    			'str_lead_destination' => $request->str_lead_destination,
    			'str_lead_destination_tested' => $request->str_lead_destination_tested,
    			'int_client_id' => $request->int_client_id,
    			'str_test_id' => $request->str_test_id
    	);
    }
    

    public function getRequestArrayTestPost($request)
    {
    	return array(
//    			'str_lead_destination' => $request->str_lead_destination,
    			'str_lead_destination_tested' => $request->str_lead_destination_tested,
//    			'int_client_id' => $request->int_client_id,
    			'str_test_id' => $request->str_test_id
    	);
    }
    
 // the dynamic assignment does not work, use manual assignment   
/*
    public function getRequestArrayTestPost($request)
    {
    	echo "str_lead_destination_tested = ".$request->str_lead_destination_tested;
    	$arr_result = array();
    	foreach ($request as $key => $item)
    	{
    		echo "in getRequestArrayTestPost, key = ".$key." item = ".$item."<br>";
    		$arr_result[$key] = $item;
    	}
    	
    	return $arr_result;
    }
  */  
    
    
    public function getDataArray(
    		$arr_request, $user_id, 
    		$arr_logged_in_user)
    {
    	return array(
    		'arr_request' => $arr_request,
    		'user_id' => $user_id,
    		'arr_logged_in_user' => $arr_logged_in_user
    	);
    } 


    public function getDataArrayAddClient(
    		$str_cloaked_client_id,
    		$arr_request, 
    		$arr_logged_in_user)
    {
    	return array(
    			'str_cloaked_client_id' => $str_cloaked_client_id,
    			'arr_request' => $arr_request,
     			'arr_logged_in_user' => $arr_logged_in_user
    	);
    }
    
    
    public function getDataArrayAddSQ(
    		$arr_request,
    		$arr_logged_in_user)
    {
    	
    	return array(
    			'arr_request' => $arr_request,
    			'arr_logged_in_user' => $arr_logged_in_user
    	);
    }

    public function getDataArrayTestPost(
    		$page_heading_content,
       		$arr_request,
       		$test_post,
    		$arr_logged_in_user)
    		
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
    			'arr_logged_in_user' => $arr_logged_in_user,
    
    	);
    
    }
    
    
    public function getDataArrayGetAddClient(
    		$arr_states,
    		$arr_projects,
    		$obj_user,
    		$client_user_id, 
    		$arr_logged_in_user)
    {
 //   	echo "in admin, getDataArrayGetAddClient, client_user_id = $client_user_id";
 //   	echo "<br>";
    	 
    	return array(
    			'client_user_id' => $client_user_id,
    			'arr_logged_in_user' => $arr_logged_in_user,
    			'arr_states' => $arr_states,
    			'arr_projects' => $arr_projects,
    			'input_old' =>array(
    					'str_company' => Input::old('str_company'),
    					'str_email_two' => Input::old('str_email_two'),
    					'str_telephone' => Input::old('str_telephone'),
 //   					'str_telephone_two' => Input::old('str_telephone_two'),
    					'str_website' => Input::old('str_website'),
    					'bool_delivery_crm' => Input::old('bool_celivery_crm'),
    					'str_email_delivery' => Input::old('str_email_delivery'),
    					'str_crm_url' => Input::old('str_crm_url'),
    					'str_crm' => Input::old('str_crm'),
    					'str_lead_destination' => Input::old('str_lead_destination'),
    					'str_first_name' => Input::old('str_first_name', $obj_user->first_name),
    					'str_last_name' => Input::old('str_last_name', $obj_user->last_name),
    					'str_city' => Input::old('str_city'),
    					'str_zip' => Input::old('str_zip'),
    					'int_state_id' => Input::old('int_state_id'),
    					'bool_active' => Input::old('bool_active'),
    					'bool_confirmed' => Input::old('bool_confirmed'),
    						

    			)
    
    	);
    	
    }
    

    public function getDataArrayGetAddRole(
    		$arr_users_processed, $page_heading_content, $arr_logged_in_user)
    {
    	return array(
    			'arr_users' => $arr_users_processed,
    			'page_heading_content' => $page_heading_content,
    			'arr_logged_in_user' => $arr_logged_in_user,
    			'input_old' =>array(
    					'user_id' => Input::old('user_id', 0)
    			)
    
    	);
    }
    

    public function getDataArrayGetAddSI(
    		$arr_logged_in_user,
    		$existing_items
    )
    {
    	return array(
    			'arr_logged_in_user' => $arr_logged_in_user,
    			'existing_items' => $existing_items,
    			'input_old' =>array(
    					'survey_question_id' => Input::old('survey_question_id', 0),
    					'str_text' => Input::old('str_text', ''),
    					'str_mult_resps_id' => Input::old('str_mult_resps_id', ''),
    					'bool_include' => Input::old('bool_include', 1),
    			)
    
    	);
    }

    
    public function getDataArrayGetAddSP(
    		$arr_logged_in_user,
    		$existing_projects
    )
    {
    	return array(
    			'arr_logged_in_user' => $arr_logged_in_user,
    			'existing_projects' => $existing_projects,
    			'input_old' =>array(
 //   					'str_name' => Input::old('str_name', ''),
    					'str_text' => Input::old('str_text', ''),
    			)
    
    	);
    }
    
    
    public function getDataArrayGetAddSQ(
    		$arr_logged_in_user,
    		$existing_questions
    )
    {
    	return array(
    			'arr_logged_in_user' => $arr_logged_in_user,
    			'existing_questions' => $existing_questions,
    			'input_old' =>array(
    					'str_name' => Input::old('str_name', ''),
    					'str_text' => Input::old('str_text', ''),
    					'str_next' => Input::old('str_next', ''),
    					'str_prev' => Input::old('str_prev', ''),
    					'bool_include' => Input::old('bool_include', 1),
    					'bool_multiple_responses' => Input::old('bool_multiple_responses', 1),
    					'bool_two_columns' => Input::old('bool_two_columns', 1),
    					'bool_first' => Input::old('bool_first', 1),
    					'bool_last' => Input::old('bool_last', 1),
    			)
    
    	);
    }
    
    
    public function getDataArrayGetAddUserAdmin(
    		$arr_logged_in_user)
    {
    	return array(
    			'arr_logged_in_user' => $arr_logged_in_user,
    			'input_old' =>array(
    					'first_name' => Input::old('first_name'),
    					'last_name' => Input::old('last_name'),
 //   					'company' => Input::old('company'),
    					'email' => Input::old('email'),
    			)
    
    	);
    }


    public function getDataArrayGetChooseClient(
    		$page_heading_content,
    		$arr_clients,
    		$arr_logged_in_user)
    {
    	return array(
    			'page_heading_content' => $page_heading_content,
    			'arr_clients' => $arr_clients,
    			'arr_logged_in_user' => $arr_logged_in_user,
    			'input_old' =>array(
    					'id' => Input::old('id', 0)
    			)
    			 
    			
    	);
    
    }
    
    
    
    public function getDataArrayGetChooseSI(
    		$arr_logged_in_user,
    		$existing_items,
    		$arr_items
    )
    {
    	return array(
    			'arr_logged_in_user' => $arr_logged_in_user,
    			'existing_items' => $existing_items,
    			'arr_items' => $arr_items,
    			'input_old' =>array(
    					'str_name' => Input::old('str_name', ''),
    					'str_text' => Input::old('str_text', ''),
    					'str_next' => Input::old('str_next', ''),
    					'str_prev' => Input::old('str_prev', ''),
    					'bool_include' => Input::old('bool_include', 1),
    					'bool_multiple_responses' => Input::old('bool_multiple_responses', 1),
    					'bool_two_columns' => Input::old('bool_two_columns', 1),
    					'bool_first' => Input::old('bool_first', 1),
    					'bool_last' => Input::old('bool_last', 1),
    			)
    
    	);
    }
    
    

    public function getDataArrayGetChooseSP(
    		$arr_logged_in_user,
    		$existing_projects,
    		$arr_projects
    )
    {
    	return array(
    			'arr_logged_in_user' => $arr_logged_in_user,
    			'existing_projects' => $existing_projects,
    			'arr_projects' => $arr_projects,
    			'input_old' =>array(
    					'str_text' => Input::old('str_text', '')
    			)
    	);
    }
    
    public function getDataArrayGetChooseSQ(
    		$arr_logged_in_user,
    		$existing_questions,
    		$arr_questions
    )
    {
    	return array(
    			'arr_logged_in_user' => $arr_logged_in_user,
    			'existing_questions' => $existing_questions,
    			'arr_questions' => $arr_questions,
    			'input_old' =>array(
    					'str_name' => Input::old('str_name', ''),
    					'str_text' => Input::old('str_text', ''),
    					'str_next' => Input::old('str_next', ''),
    					'str_prev' => Input::old('str_prev', ''),
    					'bool_include' => Input::old('bool_include', 1),
    					'bool_multiple_responses' => Input::old('bool_multiple_responses', 1),
    					'bool_two_columns' => Input::old('bool_two_columns', 1),
    					'bool_first' => Input::old('bool_first', 1),
    					'bool_last' => Input::old('bool_last', 1),
    	    			)    
    	);
    }
    

    public function getDataArrayGetClientExists(
    		$client_user_id, $arr_logged_in_user)
    {
    	return array(
    			'arr_logged_in_user' => $arr_logged_in_user,
    			'client_user_id' => $client_user_id,      
    	);
    	 
    }
    

    public function getDataArrayGetEditClient(
    		$page_heading_content,
    		$arr_states,
    		$obj_client,
    		$arr_logged_in_user)
    {
    	return array(
    			'page_heading_content' => $page_heading_content,
    			'arr_states' => $arr_states,
    			'arr_logged_in_user' => $arr_logged_in_user,
    			'input_old' =>array(
    					'str_company' => Input::old('str_company', $obj_client->str_company),
    					'str_email_two' => Input::old('str_email_two', $obj_client->str_email_two),
    					'str_telephone_one' => Input::old('str_telephone_one', $obj_client->str_telephone_one),
    					'str_telephone_two' => Input::old('str_telephone_two', $obj_client->str_telephone_two),
    					'str_website' => Input::old('str_website', $obj_client->str_website),
    					'str_crm_url' => Input::old('str_crm_url', $obj_client->str_crm_url),
    					'str_crm' => Input::old('str_crm', $obj_client->str_crm),
    					'str_lead_destination' => Input::old('str_lead_destination', $obj_client->str_lead_destination),
    					'str_first_name' => Input::old('str_first_name', $obj_client->str_first_name),
    					'str_last_name' => Input::old('str_last_name', $obj_client->str_last_name),
    					'str_city' => Input::old('str_city', $obj_client->str_city),
    					'str_zip' => Input::old('str_zip', $obj_client->str_zip),
    					'int_state_id' => Input::old('int_state_id', $obj_client->int_state_id),
    					'bool_active' => Input::old('bool_active', $obj_client->bool_active),
    					'bool_confirmed' => Input::old('bool_confirmed', $obj_client->bool_confirmed)
    			)
    	);
    
    }
    
    
    public function getDataArrayGetEditSI(
    		$arr_logged_in_user,
    		$item
    )
    {
    	return array(
    			'id' => $item->id,
    			'arr_logged_in_user' => $arr_logged_in_user,
    			'input_old' =>array(
    					//  					'str_name' => (Input::old('str_name') == null ? $question->str_name : Input::old('str_name')),
    					//   					'str_text' => (Input::old('str_text') == null ? $question->str_text : Input::old('str_text')),
    					//   					'bool_include' => (Input::old('bool_include') == null ? $question->bool_include : Input::old('bool_include')),
//    			'id' => Input::old('id', $question->id),
//    			'str_name' => Input::old('str_name', $question->str_name),
    			'str_text' => Input::old('str_text', $item->str_text),
    			'str_mult_resps_id' => Input::old('str_mult_resps_id', $item->str_mult_resps_id),
    			'bool_include' => Input::old('bool_include', $item->bool_include),
    	)
    
    	);
    }
    

    public function getDataArrayGetEditSP(
    		$arr_logged_in_user,
    		$survey_project
    )
    {
    	return array(
    			'id' => $survey_project->id,
    			'arr_logged_in_user' => $arr_logged_in_user,
    			'input_old' =>array(
    					//  					'str_name' => (Input::old('str_name') == null ? $question->str_name : Input::old('str_name')),
    					//   					'str_text' => (Input::old('str_text') == null ? $question->str_text : Input::old('str_text')),
    					//   					'bool_include' => (Input::old('bool_include') == null ? $question->bool_include : Input::old('bool_include')),
    			'id' => Input::old('id', $survey_project->id),
    
//    			'str_name' => Input::old('str_name', $question->str_name),
    			'str_text' => Input::old('str_text', $survey_project->str_text),
 //   			'str_next' => Input::old('str_next', $question->str_next),
//    			'str_prev' => Input::old('str_prev', $question->str_prev),
//    			'bool_include' => Input::old('bool_include', $question->bool_include),
//    			'bool_multiple_responses' => Input::old('bool_multiple_responses', $question->bool_multiple_responses),
//    			'bool_two_columns' => Input::old('bool_two_columns', $question->bool_two_columns),
//   			'bool_first' => Input::old('bool_first', $question->bool_first),
//   			'bool_last' => Input::old('bool_last', $question->bool_last),
    
    				
    	)
    
    	);
    }
    
    
    public function getDataArrayGetEditSQ(
    		$arr_logged_in_user,
    		$question
    )
    {
    	return array(
    			'id' => $question->id,
    			'arr_logged_in_user' => $arr_logged_in_user,
    			'input_old' =>array(
  //  					'str_name' => (Input::old('str_name') == null ? $question->str_name : Input::old('str_name')),
 //   					'str_text' => (Input::old('str_text') == null ? $question->str_text : Input::old('str_text')),
 //   					'bool_include' => (Input::old('bool_include') == null ? $question->bool_include : Input::old('bool_include')),
    					'id' => Input::old('id', $question->id),

    					'str_name' => Input::old('str_name', $question->str_name),
    					'str_text' => Input::old('str_text', $question->str_text),
    					'str_next' => Input::old('str_next', $question->str_next),
    					'str_prev' => Input::old('str_prev', $question->str_prev),
    					'bool_include' => Input::old('bool_include', $question->bool_include),
    					'bool_multiple_responses' => Input::old('bool_multiple_responses', $question->bool_multiple_responses),
    					'bool_two_columns' => Input::old('bool_two_columns', $question->bool_two_columns),
    					'bool_first' => Input::old('bool_first', $question->bool_first),
    					'bool_last' => Input::old('bool_last', $question->bool_last),
    					    					
    					
    			)
    
    	);
    }
    
    
    public function getDataArrayGetEditUser( 		
    		$page_heading_content, $arr_users_processed, $arr_logged_in_user)
    {
    	return array(
    			'page_heading_content' => $page_heading_content,
    			'arr_users' => $arr_users_processed,
    			'arr_logged_in_user' => $arr_logged_in_user,
    			'input_old' =>array(
    					'user_id' => Input::old('user_id', 0),
    					'first_name' => Input::old('first_name', ''),
    					'last_name' => Input::old('last_name', ''),
    					'company' => Input::old('company'),
    					'include_email' => Input::old('include_email', 0),
    					'email' => Input::old('email', ''),
    					'include_password' => Input::old('include_password', 0),
    			)
    
    	);
    }



    public function getDataArrayGetNoClient(
    		$page_heading_content,
    		$client_user_id,
    		$arr_logged_in_user)
    {
    	return array(
    			'page_heading_content' => $page_heading_content,
    			'client_user_id' => $client_user_id,
    			'arr_logged_in_user' => $arr_logged_in_user
    	);
    
    }
       
    public function getDataArrayTestClient(
    		$page_heading_content,
    		$arr_request,
    		$obj_client,
    		$arr_logged_in_user)
    {
//    	echo "str_lead_destination = ". $obj_client->str_lead_destination . "<br>";
    	return array(
    			'page_heading_content' => $page_heading_content,
    			'int_client_id' => $obj_client->id,
    			'str_lead_destination' => $obj_client->str_lead_destination,
    			'str_lead_destination_last' => Input::old('str_lead_destination_tested', 'not yet populated'),
 				'str_lead_destination_tested' => (!isset($arr_request['str_lead_destination_tested']))?$obj_client->str_lead_destination:$arr_request['str_lead_destination_tested'],
    			'str_company' => $obj_client->str_company,
    			'str_test_id' => (!isset($arr_request['str_test_id']))?'test 1':$arr_request['str_test_id'],
    //			('', 'test 1'),
    			'arr_logged_in_user' => $arr_logged_in_user,
    			 
    	);
    
    }
    

    public function getDataArrayGetTestPost(
    		$page_heading_content,
//    		$arr_request,
 //   		$obj_client,
    		$arr_logged_in_user)
    {
    	//    	echo "str_lead_destination = ". $obj_client->str_lead_destination . "<br>";
    	return array(
    			'page_heading_content' => $page_heading_content,
//	 			'int_client_id' => $obj_client->id,
//    			'str_lead_destination' => $obj_client->str_lead_destination,
//    			'str_lead_destination_last' => Input::old('str_lead_destination_tested', 'not yet populated'),
//    			'str_lead_destination_tested' => (is_null($arr_request['str_lead_destination_tested']))?$obj_client->str_lead_destination:$arr_request['str_lead_destination_tested'],
 //   			'str_company' => $obj_client->str_company,
 //   			'str_test_id' => (is_null($arr_request['str_test_id']))?'test 1':$arr_request['str_test_id'],
    			//			('', 'test 1'),
    			'arr_logged_in_user' => $arr_logged_in_user,
    
    	);
    
    }

    public function getDataArrayGetViewAllContacts(
    		$page_heading_content,
    		$arr_all_contacts,
    		$arr_logged_in_user)
    {
    	return array(
    			'page_heading_content' => $page_heading_content,
    			'arr_logged_in_user' => $arr_logged_in_user,
    			'arr_all_contacts' => $arr_all_contacts
    	);
    
    }
    
    
    public function getDataArrayGetViewOneContact(
    		$page_heading_content,
    		$arr_contact,
    		$arr_logged_in_user)
    {
    	return array(
    			'page_heading_content' => $page_heading_content,
    			'arr_logged_in_user' => $arr_logged_in_user,
    			'arr_contact' => $arr_contact
    	);
    
    }
    
    
    
    public function getDataArrayGetViewAllRegistrations(
    		$page_heading_content,
    		$arr_all_regs_registration_data,
    		$arr_logged_in_user)
    {
    	return array(
    			'page_heading_content' => $page_heading_content,
    			'arr_logged_in_user' => $arr_logged_in_user,
    			'arr_all_regs_registration_data' => $arr_all_regs_registration_data
    	    	);
    
    }

    
    public function getDataArrayGetViewOneRegistration(
    		$page_heading_content,
    		$arr_registration_data,
    		$arr_logged_in_user)
    {
    	return array(
    			'page_heading_content' => $page_heading_content,
    			'arr_logged_in_user' => $arr_logged_in_user,
    			'arr_registration_data' => $arr_registration_data
    	);
    
    }
    
    
    
    public function getDataArrayGetViewClient(
    		$page_heading_content,
    		$str_state,
    		$obj_client,
    		$arr_user_info,
    		$arr_logged_in_user)
    {
    	return array(
    			'page_heading_content' => $page_heading_content,
    			'str_state' => $str_state,
    			'arr_logged_in_user' => $arr_logged_in_user,
    			'arr_user_info' => $arr_user_info,
    			'obj_client' => $obj_client
/*
    			'input_old' =>array(
    					'str_company' => Input::old('str_company', $obj_client->str_company),
    					'str_email_two' => Input::old('str_email_two', $obj_client->str_email_two),
    					'str_telephone_one' => Input::old('str_telephone_one', $obj_client->str_telephone_one),
    					'str_telephone_two' => Input::old('str_telephone_two', $obj_client->str_telephone_two),
    					'str_website' => Input::old('str_website', $obj_client->str_website),
    					'str_crm_url' => Input::old('str_crm_url', $obj_client->str_crm_url),
    					'str_crm' => Input::old('str_crm', $obj_client->str_crm),
    					'str_lead_destination' => Input::old('str_lead_destination', $obj_client->str_lead_destination),
    					'str_first_name' => Input::old('str_first_name', $obj_client->str_first_name),
    					'str_last_name' => Input::old('str_last_name', $obj_client->str_last_name),
    					'str_city' => Input::old('str_city', $obj_client->str_city),
    					'str_zip' => Input::old('str_zip', $obj_client->str_zip),
    					'int_state_id' => Input::old('int_state_id', $obj_client->int_state_id),
    					'bool_active' => Input::old('bool_active', $obj_client->bool_active),
    					'bool_confirmed' => Input::old('bool_confirmed', $obj_client->bool_confirmed)

    			)
*/
    	);
    
    }
    
    

    public function getUserInfoForViewClient($obj_client)
    {
    	$arr_user_info = array();

    	$arr_user_info['first_name'] = $obj_client->user->first_name;
    	$arr_user_info['last_name'] = $obj_client->user->last_name;
    	$arr_user_info['email'] = $obj_client->user->email;
    	foreach ($obj_client as $key => $val)
    	{
    		$arr_user_info[$key] = $val;
    	}
    	echo "in admin, line 1048<br>";
    	echo "<pre>";
    	print_r($arr_user_info);
    	echo "</pre>";
    	return $arr_user_info;	 
    }
 /*   
    public function getNewCloakedClientId($email)
    {
    	// check database for pre-existing instance of this ID
    	$objCloakedClientId = null;
    //	$counterOne = 0;
//    	$counterTwo = 0;
    	while ($objCloakedClientId == null)
    	{
    		$counter = 0;
    		while (($objCloakedClientId == null) && ($counter < 20))
    		{
    		echo "counter = $counter<br>";
    			// create new cloaked client Id
    			$rawHash = Hash::make($email.microtime());
    			$new_cloaked_client_id = substr($rawHash, (20 + $counter), 10);
    			$objCloakedClientId = $this
    				->where('cloaked_client_id', $new_cloaked_client_id)
    				->first();
    			usleep(10);
    			$counter ++;
    		}
    		sleep(1);
    //		$counterOne ++;
    	} 	
    	return $objCloakedClientId->cloaked_client_id;    	 
    }
*/ 
/*
 * no longer used, used toArray()
    public function convertObjectToArray($obj)
    {
    	$arr_return = array();
    	foreach ($obj as $key => $val)
    	{
    		$arr_return[$key] = $val;
    	}
    	return $arr_return;
    		
    }
*/
    public function prepare_items_for_select($survey_item)
    {
    	$arr_items = array();
    	foreach ($survey_item as $item)
    	{
    		$arr_items[$item->id] = $item->str_text;
    	}
    	return $arr_items;
    }

    public function prepare_projects_for_select(
    		$survey_project)
    {
    	$arr_projects = array();
    	foreach ($survey_project as $project)
    	{
    		$arr_projects[$project->id] = $project->str_text;
    	}
    	return $arr_projects;
    }
    
    
    public function prepare_questions_for_select($survey_question)
    {
    	$arr_questions = array(); 
    	foreach ($survey_question as $question)
    	{
    		$arr_questions[$question->id] = $question->str_name;
    	}
    	return $arr_questions;
    }
    
}




