<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Admin;
use App\Models\Role;
use App\Models\Role_user;
use App\Models\Client;
use App\Models\PublicPages;
use App\Models\Survey_question;
use App\Models\Survey_item;
use App\Models\Survey_project;
use App\Models\State;
use App\Models\Test_post;
use App\Models\Registration;
use Hash;
use Redirect;
use DB;
use Auth;
use App\Classes\RoleHelper;
//use App\classes\Communication;
use App\Classes\CommonCode;

class AdminController extends Controller
{
	var $obj_logged_in_user;
	var $arr_logged_in_user;
	var $bool_has_role;
	var $roleHelper;
	//organization of function
	// 1. __construct
	// 2. index
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
		
	
    public function index()
    {
    	$page_heading_content = "Admin dashboard page";
    	 
    	$data = array(
    			'page_heading_content' => $page_heading_content,
    			'arr_logged_in_user' => $this->arr_logged_in_user);
    	return view('admin/dashboard')->with('data', $data);
    }


    public function get_add_client(
    		Admin $admin, 
    		Client $client,
    		State $state,
    		User $user,
    		Survey_project $survey_project,
    		Request $request)
    {
//    	$data = array('arr_logged_in_user' => $this->arr_logged_in_user);
		$obj_user = $user->find($request->client_user_id);
    	$obj_client = $client->where('user_id', $request->client_user_id)->first();
    	if (!is_null($obj_client))
    	{
//    		echo "obj_client-user_id = ".$obj_client->user_id."<br>";
    		$page_heading_content = "Admin dashboard page";
    		$data = $admin->getDataArrayGetClientExists(
    				$obj_client->user_id,
    				$this->arr_logged_in_user);
    		
    		return view('admin/client_exists')->with('data', $data);
    	}
    	else 
    	{
    		$arr_states = $state->get_states();
    		$survey_project = $survey_project->all();
    		$arr_projects = $admin->prepare_projects_for_select($survey_project);
    		$page_heading_content = "Admin dashboard page";
    		$data = $admin->getDataArrayGetAddClient(
    			$arr_states,
    			$arr_projects,
    			$obj_user, 
    			$request->client_user_id,
    			$this->arr_logged_in_user);
 //   	echo "admin controller, line 97";
 //   	echo "<pre>";
 //   	print_r($arr_projects);
 //   	echo "</pre>";
    		return view('admin/add_client')->with('data', $data);
    	}
    }
    


    public function get_add_lead_info(
    		Request $request,
    		Admin $admin,
    		Lead_info $lead_info
    )
    {
    	//    	$survey_question = $survey_question->all();
    	$lead_info = $lead_info->where('survey_project_id', $request->id)->get();
    	$data = $admin->getDataArrayGetAddLeadInfo(
    			$this->arr_logged_in_user,
    			$lead_info
    	);
    	return view('admin/add_lead_info')->with('data', $data);
    }
    
    
    
    
    public function get_add_role(User $user, Admin $admin)
    {
    	$arr_users_raw = $user->get_all_users_admin(1);  // 1 specifies order by last name
    	$arr_users_processed = $user->process_users($arr_users_raw);
    	$page_heading_content = "Admin dashboard page";
    	$data = $admin->getDataArrayGetAddRole(
    			$arr_users_processed,
    			$this->arr_logged_in_user);
    	return view('admin/add_role_admin')->with('data', $data);
    }
    

    public function get_add_survey_item(
    		Request $request,
    		Admin $admin,
    		Survey_item $survey_item
    )
    {
    	$survey_item = $survey_item->where('survey_question_id', $request->id)->get();
    	$page_heading_content = "Admin dashboard page";
    	$data = $admin->getDataArrayGetAddSI(
    			$this->arr_logged_in_user,
    			$survey_item
    	);
    	return view('admin/add_survey_item')->with('data', $data);
    }
    

    public function get_add_survey_project(
    		Request $request,
    		Admin $admin,
    		Survey_project $survey_project
    )
    {
    	$survey_project = $survey_project->all();
    	$page_heading_content = "Admin dashboard page";
    	$data = $admin->getDataArrayGetAddSP(
    			$this->arr_logged_in_user,
    			$survey_project
    	);
    	return view('admin/add_survey_project')->with('data', $data);
    }
    
    
    
    public function get_add_survey_question(
    		Request $request,
    		Admin $admin,
    		Survey_question $survey_question
    		)
    {
//    	$survey_question = $survey_question->all();
    	$survey_question = $survey_question->where('survey_project_id', $request->id)->get();
    	$page_heading_content = "Admin dashboard page";
    	$data = $admin->getDataArrayGetAddSQ(
    			$this->arr_logged_in_user,
    			$survey_question
    			);
    	return view('admin/add_survey_question')->with('data', $data);
    }

    
    public function get_add_user(Admin $admin)
    {
    	$data = array('arr_logged_in_user' => $this->arr_logged_in_user);
    	$page_heading_content = "Admin dashboard page";
    	$data = $admin->getDataArrayGetAddUserAdmin(
    			$this->arr_logged_in_user);
    	return view('admin/add_user_admin')->with('data', $data);
    }
    
    public function get_choose_client(Admin $admin, Client $client)
    {
    	$page_heading_content = "Choose a client";
   // 	$obj_all_clients_raw = $client->orderBy('str_company')->get();  // 1 specifies order by last name
    	$obj_all_clients_raw = $client->all();
foreach($obj_all_clients_raw as $client_raw)
{    	
//echo "<pre>"; 
//print_r($client_raw);
//echo "</pre>";    	
//echo "<br>";
//	echo $client_raw->id;
//echo "<br>";
//	echo $client_raw->str_first_name;
//echo "<br>";
//	echo $client_raw->str_last_name;
//	echo "<br><br>";
}
//    	$arr_users_wo_client = $user->get_users_wo_client($arr_users_raw, $obj_all_clients);
    	$arr_clients_processed = $client->prepare_clients_for_select($obj_all_clients_raw);
//echo "<pre>";    	
//print_r($arr_clients_processed);
//echo "</pre>";

    	$data = $admin->getDataArrayGetChooseClient(
    			$page_heading_content,
    			$arr_clients_processed,
    			$this->arr_logged_in_user);
    	 
    
    	return view('admin/choose_client')->with('data', $data);
    }
    
     
    
    public function get_choose_survey_item(			
    		Request $request,
    		Admin $admin,
    		Survey_item $survey_item
    )
    {
    	$survey_item = $survey_item->where('survey_question_id', $request->id)->get();
       	$arr_items = $admin->prepare_items_for_select($survey_item);
    	$page_heading_content = "Admin dashboard page";
       	$data = $admin->getDataArrayGetChooseSI(
    			$this->arr_logged_in_user,
    			$survey_item,
    			$arr_items
    	);
    	return view('admin/choose_survey_item')->with('data', $data);
    }
    

    public function get_choose_survey_project(
    		Admin $admin,
    		Survey_project $survey_project
    )
    {
    	$survey_project = $survey_project->all();
    	$arr_projects = $admin->prepare_projects_for_select($survey_project);
//    	echo "admin controller 168";
//    	echo "<pre>";
//    	print_r($arr_projects);
//    	echo "</pre>";
    	$page_heading_content = "Admin dashboard page";
    	 
    	$data = $admin->getDataArrayGetChooseSP(
    			$this->arr_logged_in_user,
    			$survey_project,
    			$arr_projects
    	);
    	return view('admin/choose_survey_project')->with('data', $data);
    }
    
    
    public function get_choose_survey_question(
    		Request $request,
    		Admin $admin,
    		Survey_question $survey_question
    )
    {
    	$survey_question = $survey_question->where('survey_project_id', $request->id)->get();
//    	$survey_question = $survey_question->all();
    	$arr_questions = $admin->prepare_questions_for_select($survey_question);
    	$page_heading_content = "Admin dashboard page";
    	$data = $admin->getDataArrayGetChooseSQ(
    			$this->arr_logged_in_user,
    			$survey_question,
    			$arr_questions
    	);
    	return view('admin/choose_survey_question')->with('data', $data);
    }

/*
    public function get_choose_survey_question_asi(
    		Admin $admin,
    		Survey_question $survey_question
    )
    {
    	$survey_question = $survey_question->all();
    	$arr_questions = $admin->prepare_questions_for_select($survey_question);
    	$data = $admin->getDataArrayGetChooseSQ(
    			$this->arr_logged_in_user,
    			$survey_question,
    			$arr_questions
    	);
    	return view('admin/choose_survey_question')->with('data', $data);
    }
 */   
/*
    public function get_choose_survey_question_esi(
    		Admin $admin,
    		Survey_question $survey_question
    )
    {
    	$survey_question = $survey_question->all();
    	$arr_questions = $admin->prepare_questions_for_select($survey_question);
    	$data = $admin->getDataArrayGetChooseSQ(
    			$this->arr_logged_in_user,
    			$survey_question,
    			$arr_questions
    	);
    	return view('admin/choose_survey_question')->with('data', $data);
    }
*/
    public function get_choose_user_add_client(
    		User $user, 
    		Admin $admin, 
    		Client $client)
    {
    	$page_heading_content = "Choose a user";
    	$arr_users_raw = $user->get_all_users_admin(1);  // 1 specifies order by last name
    	$obj_all_clients = $client->all();
    	$arr_users_wo_client = $user->get_users_wo_client($arr_users_raw, $obj_all_clients);
    	$arr_users_processed = $user->process_users($arr_users_wo_client);
    	$data = $admin->getDataArrayGetEditUser(
				$page_heading_content, 
    			$arr_users_processed,
    			$this->arr_logged_in_user);
    	
    
    	return view('admin/choose_user_add_client')->with('data', $data);
    }
    
       
    
    public function get_delete_role(User $user, Admin $admin)
    {
    	$page_heading_content = "Delete rolex - admin";
    	$arr_users_raw = $user->get_all_users_admin(1);  // 1 specifies order by last name
    	$arr_users_processed = $user->process_users($arr_users_raw);
//print_r($arr_users_processed);
    	$data = $admin->getDataArrayGetEditUser(
    			$page_heading_content,
    			$arr_users_processed,
    			$this->arr_logged_in_user);
    	return view('admin/delete_role_admin')->with('data', $data);
    }
    

    public function get_edit_client(
    		Admin $admin,
    		Client $client,
    		State $state,
    		Request $request)
    {
    	$page_heading_content = "Edit this client";
    	$obj_client = $client->where('user_id', $request->client_user_id)->first();
    	if (is_null($obj_client))
        {
    		$page_heading_content = "No client found";
    		$data = $admin->getDataArrayGetNoClient(
    				$page_heading_content,
    				$request->client_user_id,
    				$this->arr_logged_in_user);
    		return view('admin/no_client')->with('data', $data);
    	}
       	else
    	{
	    	$arr_states = $state->get_states();
    
 	 	  	$data = $admin->getDataArrayGetEditClient(
				$page_heading_content,
       			$arr_states,
    			$obj_client, 
    			$this->arr_logged_in_user);
     		return view('admin/edit_client')->with('data', $data);
    	}
    }


    public function get_edit_client_lead_vars(
    		Admin $admin,
    		Client $client,
 //   		State $state,
    		Request $request)
    {
    	$page_heading_content = "Edit lead variables for this client";
    	$obj_client = $client->where('user_id', $request->client_user_id)->first();
    	if (is_null($obj_client))
        {
    		$page_heading_content = "No client found";
    		$data = $admin->getDataArrayGetNoClient(
    				$page_heading_content,
    				$request->client_user_id,
    				$this->arr_logged_in_user);
    		return view('admin/no_client')->with('data', $data);
    	}
       	else
    	{
	//    	$arr_states = $state->get_states();
    
 	 	  	$data = $admin->getDataArrayGetEditClientLeadVars(
				$page_heading_content,
//       			$arr_states,
    			$obj_client, 
    			$this->arr_logged_in_user);
     		return view('admin/edit_client_lead_vars')->with('data', $data);
    	}
    }
    		    
    
    public function get_edit_survey_item(
    		Request $request,
    		Admin $admin,
    		Survey_item $survey_item
    )
    {
  	
//echo "request int_survey_item id = ".$request->id."<br>";    	
    	$survey_item = $survey_item->find($request->id);
//echo "survey item str_text = ".$survey_item->str_text."<br>";
    	$page_heading_content = "Admin dashboard page";
    	$data = $admin->getDataArrayGetEditSI(
    			$this->arr_logged_in_user,
    			$survey_item
    	);
    	return view('admin/edit_survey_item')->with('data', $data);
    }

    public function get_edit_survey_project(
    		Request $request,
    		Admin $admin,
    		Survey_project $survey_project
    )
    {
    	//    	echo "request id = ".$request->id."<br>";
    	$survey_project = $survey_project->find($request->id);
    	//		echo "survey quesiton id = <br>";
    	//    	echo "<pr>";
    	//    	echo $survey_question->id;
    	//    	echo "<pr>";
    	$page_heading_content = "Admin dashboard page";
    	$data = $admin->getDataArrayGetEditSP(
    			$this->arr_logged_in_user,
    			$survey_project
    	);
    	return view('admin/edit_survey_project')->with('data', $data);
    }
    
    
    
    public function get_edit_survey_question(
    		Request $request,
    		Admin $admin,
    		Survey_question $survey_question
    )
    {
//    	echo "request id = ".$request->id."<br>";
    	$survey_question = $survey_question->find($request->id);
//		echo "survey quesiton id = <br>";
//    	echo "<pr>";
//    	echo $survey_question->id;
//    	echo "<pr>";
    	$page_heading_content = "Admin dashboard page";
    	$data = $admin->getDataArrayGetEditSQ(
    			$this->arr_logged_in_user,
    			$survey_question
    	);
    	return view('admin/edit_survey_question')->with('data', $data);
    }
    
         
    public function get_edit_user(User $user, Admin $admin)
    {
    	$page_heading_content = "Edit a user";
    	$arr_users_raw = $user->get_all_users_admin(1);  // 1 specifies order by last name
    	$arr_users_processed = $user->process_users($arr_users_raw);
    	$data = $admin->getDataArrayGetEditUser(
				$page_heading_content, 
    			$arr_users_processed,
    			$this->arr_logged_in_user);
    
    	return view('admin/edit_user_admin')->with('data', $data);
    }
    

    public function get_see_posts(
    		Admin $admin,
    		Test_post $test_post
    		)  		// 		CloakedClientId $cloakedClientId)
    {
    	//    	$validation_rules = $admin->getValidationRulesTestClient();
    	//    	$this->validate($request, $validation_rules);
//    	$arr_request = $admin->getRequestArrayTestPost($request);
    	// this function was copied from three step, client info not necessary here
    	// use publisher as client
    	//    	$client->cloaked_client_id = $client->getNewCloakedClientId($user->id);
    	 
    	 
    	//   	$obj_client = $client->where('id', $request->int_client_id)->first();
//    	$test_post->str_lead_destination_tested = $arr_request['str_lead_destination_tested'];
//    	$test_post->str_test_id = $arr_request['str_test_id'];
 //   	$test_post->save();
    	$test_post = $test_post->orderBy('created_at', 'asc')->get();
    
    	 
    	 
    	$page_heading_content = "See posts from test post ap";
    
    	$data = $admin->getDataArrayTestPost(
    			$page_heading_content,
    			array(),
    			$test_post,
    			$this->arr_logged_in_user);
    	return view('admin/see_posts')->with('data', $data);
    }
    
    

    public function get_test_client(
    		Client $client, 
    		Admin $admin, 
    		Request $request)
    {
    	$page_heading_content = "Test a client";
    	$obj_client = $client->where('user_id', $request->client_user_id)->first();
    	if (is_null($obj_client))
        {
//    		echo "no client found for this user";
    		$page_heading_content = "No client found";
    		$data = $admin->getDataArrayGetNoClient(
    				$page_heading_content,
    				$request->client_user_id,
    				$this->arr_logged_in_user);
    		return view('admin/no_client')->with('data', $data);
    	}
    		//    	else
 //   	{
 //   		$arr_client = $admin->getClientData($obj_client);
 //   	}
//    	$arr_states = $state->get_states();
    
    	$data = $admin->getDataArrayTestClient(
				$page_heading_content,
 				null, // this is where the currect lead destination being tested goes in the post version
    			$obj_client, 
    			$this->arr_logged_in_user);
    	//   	echo "admin controller, line 78";
    	//   	echo "<pre>";
    	//   	print_r($data);
    	//   	echo "</pre>";
    	return view('admin/test_client')->with('data', $data);
    }
    
    
    // start post functions


    public function get_test_post(
    		Admin $admin)
    {
    	$page_heading_content = "Test a post request";
 //   	$obj_client = $client->where('user_id', $request->client_user_id)->first();
//    	if (is_null($obj_client))
 //   		echo "no client found for this user";
    	//    	else
    	//   	{
    	//   		$arr_client = $admin->getClientData($obj_client);
    		//   	}
    		//    	$arr_states = $state->get_states();
    
    		$data = $admin->getDataArrayGetTestPost(
    				$page_heading_content,
//    				null, // this is where the currect lead destination being tested goes in the post version
 //   				$obj_client,
    				$this->arr_logged_in_user);
    		//   	echo "admin controller, line 78";
    		//   	echo "<pre>";
    		//   	print_r($data);
    		//   	echo "</pre>";
    		return view('admin/test_post')->with('data', $data);
    }


    public function get_view_client(
    		Admin $admin,
    		Client $client,
    		State $state,
    		Request $request)
    {
    	//    	echo "request-client_user_id = ".$request->client_user_id."<br>";
    	//    	$data = array('arr_logged_in_user' => $this->arr_logged_in_user);
    	$obj_client = $client->where('user_id', $request->client_user_id)->first();
    	if (is_null($obj_client))
    	{
//    		echo "no client found for this user";
    		$page_heading_content = "No client found";
    		$data = $admin->getDataArrayGetNoClient(
    				$page_heading_content,
    				$request->client_user_id,
    				$this->arr_logged_in_user);
    		return view('admin/no_client')->with('data', $data);
    	}
    	$arr_user_info = $obj_client->getAttributes();
    	$page_heading_content = "View this client";
    	//    	else
    	//   	{
    	//   		$arr_client = $admin->getClientData($obj_client);
    		//   	}
 //   	$arr_states = $state->get_states();
    	$str_state = $state->find($obj_client->int_state_id)->str_text;
    	$data = $admin->getDataArrayGetViewClient(
    			$page_heading_content,
    			$str_state,
    			$obj_client,
    			$arr_user_info,
    			$this->arr_logged_in_user
    		);
    		//   	echo "admin controller, line 78";
    		//   	echo "<pre>";
    		//   	print_r($data);
    		//   	echo "</pre>";
    	return view('admin/view_client')->with('data', $data);
    }
    

    public function get_view_all_registrations(
    		Admin $admin,
    		Registration $registration,
    		Request $request)
    {
    	// get all registrations
    	$obj_registrations = $registration
    							->orderBy("created_at", 'desc')
    							->get();
    	// if no registrations, notify user
    	if (is_null($obj_registrations))
    	{
    		//    		echo "no client found for this user";
    		$page_heading_content = "No registrations found";
    		$data = $admin->getDataArrayGetNoRegistrations(
    				$page_heading_content,
//    				$request->client_user_id,
    				$this->arr_logged_in_user);
    		return view('admin/no_registrations')->with('data', $data);
    	}
    	
    	$arr_all_regs_registration_data = array();
    	
    	// iterate through each registration, get registration data
    	foreach ($obj_registrations as $foreach_registration)
    	{
    		$obj_registration_data = 
    			$registration
    				->find($foreach_registration->id)
    				->registration_data;

    		$arr_registration_data_raw = 
    				$obj_registration_data->toArray();
    		// reformulate each reg_data to one array with all data 
    		foreach ($arr_registration_data_raw as $item)
    		{
    			$arr_registration_data_processed[$item['str_col_name']] =
    					$item['str_value'];
    		} 
    		// add registration ID, created at, and link for drill down 
    		$arr_registration_data_processed['registration_id'] = $foreach_registration->id;
    		$arr_registration_data_processed['created_at'] = $foreach_registration->created_at;
    		$arr_registration_data_processed['link'] = '/admin/view_one_registration/'.$foreach_registration->id;
    		
    		// transfer to main array
    		$arr_all_regs_registration_data
    				[$foreach_registration->id]
    				 = $arr_registration_data_processed;
    	} // end foreach ($obj_registrations

    	$page_heading_content = "View all registrations";
    	$data = $admin->getDataArrayGetViewAllRegistrations(
    				$page_heading_content,
    				$arr_all_regs_registration_data,
    				$this->arr_logged_in_user
    		);
    		//   	echo "admin controller, line 679";
    		//   	echo "<pre>";
    		//   	print_r($data);
    		//   	echo "</pre>";
    		return view('admin/view_all_registrations')->with('data', $data);
    }
    

    public function get_view_one_registration(
    		Admin $admin,
    		Registration $registration,
    		Request $request)
    {
    	// get all registrations
    	$obj_registration = $registration
    	->find($request->registration_id);
    	// if no registrations, notify user
    	if (is_null($obj_registration))
    	{
    		//    		echo "no client found for this user";
    		$page_heading_content = "No registrations found";
    		$data = $admin->getDataArrayGetNoRegistrations(
    				$page_heading_content,
    				//    				$request->client_user_id,
    				$this->arr_logged_in_user);
    		return view('admin/no_registration')->with('data', $data);
    	}
    	 
 //   	$arr_all_regs_registration_data = array();
    	 
    	// iterate through each registration, get registration data
 //   	foreach ($obj_registrations as $foreach_registration)
//    	{
    	$obj_registration_data =
    		$obj_registration
    		->registration_data;
    
    	$arr_registration_data_raw =
    		$obj_registration_data->toArray();
    		// reformulate each reg_data to one array with all data
    	foreach ($arr_registration_data_raw as $item)
    	{
    		$arr_registration_data_processed[$item['str_col_name']] =
    		$item['str_value'];
    	}
    		// add registration ID, created at, and link for drill down
    	$arr_registration_data_processed['registration_id'] = $obj_registration->id;
    	$arr_registration_data_processed['created_at'] = $obj_registration->created_at;
 //   		$arr_registration_data_processed['link'] = '/admin/view_registration/'.$foreach_registration->id;
      
    	$page_heading_content = "View one registration";
    	$data = $admin->getDataArrayGetViewOneRegistration(
    			$page_heading_content,
    			$arr_registration_data_processed,
    			$this->arr_logged_in_user
    	);
    	//   	echo "admin controller, line 679";
    	//   	echo "<pre>";
    	//   	print_r($data);
    	//   	echo "</pre>";
    	return view('admin/view_one_registration')->with('data', $data);
    }
    
    
    
    		// start post functions
    
    
    
    public function post_add_client(
    		Request $request,
    		Admin $admin,
    		User $user,
    		Client $client,
    		CommonCode $cCode)
    		// 		CloakedClientId $cloakedClientId)
    {
    	$validation_rules = $admin->getValidationRulesAddClientDO();
    	$this->validate($request, $validation_rules);

    	if((int)$request->bool_delivery_crm)
    	{
    		// if delvery by email
    		$validation_rules = $admin->getValidationRulesAddClientEmail();
    		$this->validate($request, $validation_rules);
    		$arr_request = $admin->getRequestArrayAddClientEmail($request);
    		
    	}
    	else
    	{
    		// if delivery by CRM
    		$validation_rules = $admin->getValidationRulesAddClientCRM();
    		$this->validate($request, $validation_rules);
    		$arr_request = $admin->getRequestArrayAddClientCRM($request);
    		
    	}
 //   echo "request - bool active = ".$request->bool_active."<br>";
 //   	$arr_request = $admin->getRequestArrayAddClient($request);
//echo "arr_request - survey+project id = ".$arr_request['survey_project_id']."<br>";
    	// this function was copied from three step, client info not necessary here
    	// use publisher as client
		$obj_client = $client->where('user_id', $arr_request['client_user_id'])->first();
		if ($obj_client != null)
    		return view('admin/client_exists');
//		else
//			echo "this user does not have any client profile<br>";
//		$user->email = $arr_request['email'];
//		$user->password = $arr_request['password'];
		//    	$user->name = '';
//		$user->first_name = $arr_request['first_name'];
//		$user->last_name = $arr_request['last_name'];
//		$user->save();
		$client->str_cloaked_client_id = $client->getNewCloakedClientId($user->id);		
    	$client->user_id = $arr_request['client_user_id'];
    	$client->survey_project_id = $arr_request['survey_project_id'];
    	//this is set above, by actually creating the cloaked id
//    	$client->cloaked_client_id = $arr_request['cloaked_client_id'];
    	$client->str_email_two = $arr_request['str_email_two'];
    	$client->str_website = $arr_request['str_website'];
    	$client->bool_delivery_crm = $arr_request['bool_delivery_crm'];
    	$client->str_first_name = $arr_request['str_first_name'];
    	$client->str_last_name = $arr_request['str_last_name'];
    	$client->str_telephone = $arr_request['str_telephone'];
    //	$client->str_telephone_two = $arr_request['str_telephone_two'];
    	$client->str_company = $arr_request['str_company'];
    	$client->str_city = $arr_request['str_city'];
    	$client->str_zip = $arr_request['str_zip'];
    	$client->int_state_id = $arr_request['int_state_id'];
    	$client->bool_active = $arr_request['bool_active'];
    	$client->bool_confirmed = $arr_request['bool_confirmed'];
    	if(!$request->bool_delivery_crm)
    	{
    		$client->str_email_delivery = $arr_request['str_email_delivery'];
    	}
    	else 
    	{
    		$client->str_crm = $arr_request['str_crm'];
    		$client->str_crm_url = $arr_request['str_crm_url'];
    		$client->str_lead_destination = $arr_request['str_lead_destination'];
    	}
    	$client ->save();
    	//    	$user_id = $user->id;
    	// return to raw password for view
 //   	$arr_request['password'] = $request->password;
    
    	$data = $admin->getDataArrayAddClient(
    			$client->str_cloaked_client_id,
    			$arr_request,
    			$this->arr_logged_in_user);
    	return view('admin/add_client_results_admin')->with('data', $data);
    }
    

    public function post_add_role(
    		Request $request, User $user, Role $role,
    		Role_user $role_user, Admin $admin)
    {
    	$validation_rules = $admin->getValidationRulesAddRole();
    	$validation_messages = $admin->getValidationMessagesEditUser();
    	$this->validate($request, $validation_rules, $validation_messages);
    
    	$arr_request = $admin->getRequestArrayAddRole($request);
    
    	// check for identical rows already in role_user
    	$arr_role_user = $role_user
    	->where('user_id', '=', $arr_request['user_id'])
    	->where('role_id', '=', $arr_request['role_id'])
    	->get();
    	if(empty($arr_role_user))
    	{
    		$bool_role_user_exists = 0;
    		$role_user->add_role($arr_request['user_id'], $arr_request['role_id']);
    	}
    	else
    	{
    		$bool_role_user_exists = 1;
    	}
    
    	//prepare text for output
    	$user = $user->find($arr_request['user_id']);
    	$arr_request['first_name'] = $user->first_name;
    	$arr_request['last_name'] = $user->last_name;
    	$role = $role->find($arr_request['role_id']);
    	$arr_request['role'] = $role->name;
    
    	$data = $admin->getDataArray(
    			$arr_request, 0,
    			$this->arr_logged_in_user);
    
    	if ($bool_role_user_exists)
    	{
    		return view('admin/add_role_results_failure_admin')->with('data', $data);
    	}
    	else
    	{
    		return view('admin/add_role_results_admin')->with('data', $data);
    	}
    }
       

    public function post_add_survey_item(
    		Request $request,
    		Admin $admin,
    		Survey_item $survey_item,
    		//    		Client $client,
    		CommonCode $cCode)
    		// 		CloakedClientId $cloakedClientId)
    {
    	$validation_rules = $admin->getValidationRulesAddSI();
    	$this->validate($request, $validation_rules);
    
    	$arr_request = $admin->getRequestArrayAddSI($request);
    	//    	echo "bool_include = ".$arr_request['bool_include']."<br>";
    	$survey_item->survey_question_id = $arr_request['survey_question_id'];
    	$survey_item->str_text = $arr_request['str_text'];
    	$survey_item->str_mult_resps_id = $arr_request['str_mult_resps_id'];
    	$survey_item->bool_include = $arr_request['bool_include'];
    	$survey_item->save();
    	//    	$user_id = $user->id;
    	// return to raw password for view
    	//    	$arr_request['password'] = $request->password;
    
    	$data = $admin->getDataArrayAddSQ(
    			$arr_request,
    			//    			$client->cloaked_client_id,
    			$this->arr_logged_in_user);
    	return view('admin/add_survey_item_results')->with('data', $data);
    }
    

    public function post_add_survey_project(
    		Request $request,
    		Admin $admin,
    		Survey_project $survey_project,
    		//    		Client $client,
    		CommonCode $cCode)
    		// 		CloakedClientId $cloakedClientId)
    {
    	$validation_rules = $admin->getValidationRulesAddSP();
    	$this->validate($request, $validation_rules);
    
    	$arr_request = $admin->getRequestArrayAddSP($request);
    	//    	echo "bool_include = ".$arr_request['bool_include']."<br>";
  //  	$survey_project->str_name = $arr_request['str_name'];
    	$survey_project->str_text = $arr_request['str_text'];
	   	$survey_project->save();
    	$arr_request['survey_project_id'] = $survey_project	->id;
    	// return to raw password for view
    	//    	$arr_request['password'] = $request->password;
    
    	$data = $admin->getDataArrayAddSQ(
    			$arr_request,
    			//    			$client->cloaked_client_id,
    			$this->arr_logged_in_user);
    	return view('admin/add_survey_project_results')->with('data', $data);
    }
    
    public function post_add_survey_question(
    		Request $request,
    		Admin $admin,
    		Survey_question $survey_question,
//    		Client $client,
    		CommonCode $cCode)
    		// 		CloakedClientId $cloakedClientId)
    {
    	$validation_rules = $admin->getValidationRulesAddSQ();
    	$this->validate($request, $validation_rules);
    
    	$arr_request = $admin->getRequestArrayAddSQ($request);
//    	echo "bool_include = ".$arr_request['bool_include']."<br>";
    	$survey_question->survey_project_id = $arr_request['survey_project_id'];
    	$survey_question->str_name = $arr_request['str_name'];
    	$survey_question->str_text = $arr_request['str_text'];
    	$survey_question->str_next = $arr_request['str_next'];
    	$survey_question->str_prev = $arr_request['str_prev'];
    	$survey_question->bool_include = $arr_request['bool_include'];
    	$survey_question->bool_multiple_responses = $arr_request['bool_multiple_responses'];
    	$survey_question->bool_two_columns = $arr_request['bool_two_columns'];
    	$survey_question->bool_first = $arr_request['bool_first'];
    	$survey_question->bool_last = $arr_request['bool_last'];
    	$survey_question->save();
    	$arr_request['survey_question_id'] = $survey_question->id;
    	// return to raw password for view
//    	$arr_request['password'] = $request->password;
    
    	$data = $admin->getDataArrayAddSQ(
    			$arr_request,
//    			$client->cloaked_client_id,
    			$this->arr_logged_in_user);
    	return view('admin/add_survey_question_results')->with('data', $data);
    }

    
    public function post_add_user(
    		Request $request,
    		Admin $admin,
    		User $user,
    		Client $client,
 //   		State $state,
    		CommonCode $cCode)
    		// 		CloakedClientId $cloakedClientId)
    {
    	$validation_rules = $admin->getValidationRules();
    	$this->validate($request, $validation_rules);
    
    	$arr_request = $admin->getRequestArray($request);
    	$user->email = $arr_request['email'];
    	$user->password = $arr_request['password'];
//    	$user->name = '';
    	$user->first_name = $arr_request['first_name'];
    	$user->last_name = $arr_request['last_name'];
    	$user->save();
    	// this function was copied from three step, client info not necessary here
    	// use publisher as client
 //   	$client->str_cloaked_client_id = $client->getNewCloakedClientId($user->id);
 //   	$client->user_id = $user->id;
  //  	$client->str_first_name = $arr_request['first_name'];
  //  	$client->str_last_name = $arr_request['last_name'];
  //  	$client->str_company = $arr_request['company'];
  //  	$client ->save();
    	//    	$user_id = $user->id;
    	// return to raw password for view
    	$arr_request['password'] = $request->password;
    
    	$data = $admin->getDataArray(
    			$arr_request, $user->id,
    	//		$client->str_cloaked_client_id,
    			$this->arr_logged_in_user);
    	return view('admin/add_user_results_admin')->with('data', $data);
    }
      

    public function post_choose_client(
    		Request $request,
    		Admin $admin
    )
    {
    	$validation_rules = $admin->getValidationRulesChooseClient();
    	$this->validate($request, $validation_rules);
    
    	if ($request->str_choice == 'test')
    		return redirect('admin/test_client/'.$request->client_id);

    	if ($request->str_choice == 'view')
    		return redirect('admin/view_client/'.$request->client_id);
    	 
    	if ($request->str_choice == 'edit')
    		return redirect('admin/edit_client/'.$request->client_id);

    	if ($request->str_choice == 'edit_lead_vars')
    		return redirect('admin/edit_client_lead_vars/'.$request->client_id);
    	 
    	//    	return redirect('admin/add_edit_client/'.$request->user_id);
    }
    
    
    
    public function post_choose_survey_item(
    		Request $request,
    		Admin $admin
			)
    {
//    	echo "post request int survey item idid = ".$request->int_survey_item_id;
    	$validation_rules = $admin->getValidationRulesChooseSI();
    	$this->validate($request, $validation_rules);

    	if ($request->str_choice == 'edit')
    		return redirect('admin/edit_survey_item/'.$request->survey_item_id);
    	 
    	if ($request->str_choice == 'delete')
    		return redirect('admin/delete_survey_item/'.$request->survey_item_id);
    	 
 //   	return redirect('admin/edit_survey_item/'.$request->int_survey_item_id);
    }
    

    public function post_choose_survey_project(
    		Request $request,
    		Admin $admin
    )
    {
    	//    	echo "post request int survey item idid = ".$request->int_survey_item_id;
    	$validation_rules = $admin->getValidationRulesChooseSP();
    	$this->validate($request, $validation_rules);
//    	echo 'request -> str_choice = '.$request->str_choice."<br>";
 //   	echo "<pre>";
 //   	print_r($request);
 //   	echo "</pre>";

    	if ($request->str_choice == 'add')
    		return redirect('admin/add_survey_question/'.$request->int_survey_project_id);
    	 
    	if ($request->str_choice == 'manipulate')
    		return redirect('admin/choose_survey_question/'.$request->int_survey_project_id);

    	if ($request->str_choice == 'edit')
    		return redirect('admin/edit_survey_project/'.$request->int_survey_project_id);

    	if ($request->str_choice == 'delete')
    		return redirect('admin/delete_survey_project/'.$request->int_survey_project_id);

    	if ($request->str_choice == 'add_lead_info')
    		return redirect('admin/add_lead_info/'.$request->int_survey_project_id);

    	if ($request->str_choice == 'choose_lead_info')
    		return redirect('admin/choose_lead_info/'.$request->int_survey_project_id);
    	 
    	 
    }
    
    
    public function post_choose_survey_question(
    		Request $request,
    		Admin $admin
    )
    {
    	$validation_rules = $admin->getValidationRulesChooseSQ();
    	$this->validate($request, $validation_rules);

    	if ($request->str_choice == 'add')
    		return redirect('admin/add_survey_item/'.$request->survey_question_id);
    	
    	if ($request->str_choice == 'manipulate')
    		return redirect('admin/choose_survey_item/'.$request->survey_question_id);
    	
    	if ($request->str_choice == 'edit')
    		return redirect('admin/edit_survey_question/'.$request->survey_question_id);
    	
    	if ($request->str_choice == 'delete')
    		return redirect('admin/delete_survey_question/'.$request->survey_question_id);
    	 
//    	return redirect('admin/edit_survey_question/'.$request->survey_question_id);
    }
    
/*
    public function post_choose_survey_question_asi(
    		Request $request,
    		Admin $admin
    )
    {
    	$validation_rules = $admin->getValidationRulesChooseSQ();
    	$this->validate($request, $validation_rules);
    
    	return redirect('admin/add_survey_item/'.$request->survey_question_id);
    }
*/    
/*
    public function post_choose_survey_question_esi(
    		Request $request,
    		Admin $admin
    )
    {
    	$validation_rules = $admin->getValidationRulesChooseSQ();
    	$this->validate($request, $validation_rules);
    
    	return redirect('admin/choose_survey_item/'.$request->survey_question_id);
    }
*/
    
    public function post_choose_user_add_client(
    		Request $request,
    		Admin $admin
    )
    {
    	$validation_rules = $admin->getValidationRulesChooseUser();
    	$this->validate($request, $validation_rules);

    	return redirect('admin/add_client/'.$request->client_user_id);
    	
//    	if ($request->str_choice == 'edit')
//    		return redirect('admin/edit_client/'.$request->client_user_id);
    	 
//    	return redirect('admin/add_edit_client/'.$request->user_id);
    }
    
    
    public function post_delete_role(
    		Request $request, User $user,
    		Role $role, Role_user $role_user, Admin $admin)
    {
    	$validation_rules = $admin->getValidationRulesAddRole();
    	$validation_messages = $admin->getValidationMessagesEditUser();
    	$this->validate($request, $validation_rules, $validation_messages);
    
    	$arr_request = $admin->getRequestArrayAddRole($request);
    	$role_user->delete_role($arr_request['user_id'],
    			$arr_request['role_id']);
    
    	//prepare text for output
    	$user = $user->find($arr_request['user_id']);
    	$arr_request['first_name'] = $user->first_name;
    	$arr_request['last_name'] = $user->last_name;
    	$role = $role->find($arr_request['role_id']);
    	$arr_request['role'] = $role->name;
    
    	$data = $admin->getDataArray(
    			$arr_request, 0,
    			$this->arr_logged_in_user);
    
    	return view('admin/delete_role_results_admin')->with('data', $data);
    }


    public function post_edit_client(
    		Request $request,
    		Admin $admin,
    		Client $client,
    		CommonCode $cCode)
    		// 		CloakedClientId $cloakedClientId)
    {
    	$validation_rules = $admin->getValidationRulesAddClient();
    	$this->validate($request, $validation_rules);
    
    	$arr_request = $admin->getRequestArrayAddClient($request);
    	// this function was copied from three step, client info not necessary here
    	// use publisher as client
    	//    	$client->cloaked_client_id = $client->getNewCloakedClientId($user->id);
    	$obj_client = $client->where('user_id', $arr_request['client_user_id'])->first();
    	if ($obj_client != null)
    		$client = $obj_client;
    	else
    		echo "no user found for client / user_id<br>";
//    	$client->user_id = $arr_request['client_user_id'];
    	$client->str_email_two = $arr_request['str_email_two'];
    	$client->str_website = $arr_request['str_website'];
    	$client->str_crm = $arr_request['str_crm'];
    	$client->str_crm_url = $arr_request['str_crm_url'];
    	$client->str_lead_destination = $arr_request['str_lead_destination'];
    	$client->str_first_name = $arr_request['str_first_name'];
    	$client->str_last_name = $arr_request['str_last_name'];
    	$client->str_telephone_one = $arr_request['str_telephone_one'];
    	$client->str_telephone_two = $arr_request['str_telephone_two'];
    	$client->str_company = $arr_request['str_company'];
    	$client->str_city = $arr_request['str_city'];
    	$client->str_zip = $arr_request['str_zip'];
    	$client->int_state_id = $arr_request['int_state_id'];
    	$client->bool_active = $arr_request['bool_active'];
    	$client->bool_confirmed = $arr_request['bool_confirmed'];
    	//    	$client->str_email_two = $arr_request['str_email_two'];
    	$client ->save();
    	//    	$user_id = $user->id;
    	// return to raw password for view
    	//   	$arr_request['password'] = $request->password;
    
    	$data = $admin->getDataArrayAddClient(
    			$client->str_cloaked_client_id,
    			$arr_request,
    			$this->arr_logged_in_user);
    	return view('admin/edit_client_results_admin')->with('data', $data);
    }
    
    

    public function post_edit_survey_item(
    		Request $request,
    		Admin $admin,
    		Survey_item $survey_item,
    		//    		Client $client,
    		CommonCode $cCode)
    		// 		CloakedClientId $cloakedClientId)
    {
    	$validation_rules = $admin->getValidationRulesEditSI();
    	$this->validate($request, $validation_rules);
    
    	$arr_request = $admin->getRequestArrayEditSI($request);
    	//    	echo "bool_include = ".$arr_request['bool_include']."<br>";
    	$survey_item = $survey_item->find($request->id);
//    	$survey_item->str_name = $arr_request['str_name'];
    	$survey_item->str_text = $arr_request['str_text'];
    	$survey_item->str_mult_resps_id = $arr_request['str_mult_resps_id'];
    	$survey_item->bool_include = $arr_request['bool_include'];
    	$survey_item->save();
    	//    	$user_id = $user->id;
    	// return to raw password for view
    	//    	$arr_request['password'] = $request->password;
    
    	$data = $admin->getDataArrayAddSQ(
    			$arr_request,
    			//    			$client->cloaked_client_id,
    			$this->arr_logged_in_user);
    	return view('admin/edit_survey_item_results')->with('data', $data);
    }

    public function post_edit_survey_project(
    		Request $request,
    		Admin $admin,
    		Survey_project $survey_project,
    		//    		Client $client,
    		CommonCode $cCode)
    		// 		CloakedClientId $cloakedClientId)
    {
    	$validation_rules = $admin->getValidationRulesEditSP();
    	$this->validate($request, $validation_rules);
    
    	$arr_request = $admin->getRequestArrayEditSP($request);
    	//    	echo "bool_include = ".$arr_request['bool_include']."<br>";
    	$survey_project = $survey_project->find($request->id);
    	//    	$survey_item->str_name = $arr_request['str_name'];
    	$survey_project->str_text = $arr_request['str_text'];
 //   	$survey_item->str_mult_resps_id = $arr_request['str_mult_resps_id'];
//    	$survey_item->bool_include = $arr_request['bool_include'];
    	$survey_project->save();
    	//    	$user_id = $user->id;
    	// return to raw password for view
    	//    	$arr_request['password'] = $request->password;
    
    	$data = $admin->getDataArrayAddSQ(
    			$arr_request,
    			//    			$client->cloaked_client_id,
    			$this->arr_logged_in_user);
    	return view('admin/edit_survey_project_results')->with('data', $data);
    }
        
    
    public function post_edit_survey_question(
    		Request $request,
    		Admin $admin,
    		Survey_question $survey_question,
    		//    		Client $client,
    		CommonCode $cCode)
    		// 		CloakedClientId $cloakedClientId)
    {
    	$validation_rules = $admin->getValidationRulesEditSQ();
    	$this->validate($request, $validation_rules);
    
    	$arr_request = $admin->getRequestArrayEditSQ($request);
    	//    	echo "bool_include = ".$arr_request['bool_include']."<br>";

    	$survey_question = $survey_question->find($request->id);
    	$survey_question->str_name = $arr_request['str_name'];
    	$survey_question->str_text = $arr_request['str_text'];
    	$survey_question->str_next = $arr_request['str_next'];
    	$survey_question->str_prev = $arr_request['str_prev'];
    	$survey_question->bool_include = $arr_request['bool_include'];
    	$survey_question->bool_multiple_responses = $arr_request['bool_multiple_responses'];
    	$survey_question->bool_two_columns = $arr_request['bool_two_columns'];
    	$survey_question->bool_first = $arr_request['bool_first'];
    	$survey_question->bool_last = $arr_request['bool_last'];
    	$survey_question->save();
    	 
    	
 /*   	
    	$survey_question = $survey_question->find($request->id);
    	$survey_question->str_name = $arr_request['str_name'];
    	$survey_question->str_text = $arr_request['str_text'];
    	$survey_question->bool_include = $arr_request['bool_include'];
    	$survey_question->bool_multiple_responses = $arr_request['bool_multiple_responses'];
    	$survey_question->bool_two_columns = $arr_request['bool_two_columns'];
    	$survey_question->save();
*/
    	//    	$user_id = $user->id;
    	// return to raw password for view
    	//    	$arr_request['password'] = $request->password;
    
    	$data = $admin->getDataArrayAddSQ(
    			$arr_request,
    			//    			$client->cloaked_client_id,
    			$this->arr_logged_in_user);
    	return view('admin/edit_survey_question_results')->with('data', $data);
    }

  //this is a duplicate, I do not remember when I inserted this
/*    public function post_choose_user_add_client(Request $request,
    		User $user, Admin $admin, CommonCode $cCode)
    {
    	$bool_include_password = $cCode->setCheckboxVar($request->include_password);
    	$bool_include_email = $cCode->setCheckboxVar($request->include_email);
    
    	$validation_rules = $admin->getValidationRulesEditUser();
    	$validation_messages = $admin->getValidationMessagesEditUser();
    	$this->validate($request, $validation_rules, $validation_messages);
    } 
*/   
    
    public function post_edit_user(Request $request,
    		User $user, Admin $admin, CommonCode $cCode)
    {
    	$bool_include_password = $cCode->setCheckboxVar($request->include_password);
    	$bool_include_email = $cCode->setCheckboxVar($request->include_email);
    
    	$validation_rules = $admin->getValidationRulesEditUser();
    	$validation_messages = $admin->getValidationMessagesEditUser();
    	$this->validate($request, $validation_rules, $validation_messages);
    
    	if ($bool_include_email)
    	{
    		$validation_rules = [
    		'email' => 'required|email|max:50|unique:users',
    		];
    		$this->validate($request, $validation_rules);
    	}
    
    	if ($bool_include_password)
    	{
    		$validation_rules = [
    		'password' => 'required|confirmed|max:50|min:6'
    				];
    		$this->validate($request, $validation_rules);
    	}
    
    	$obj_user = $user->find($request->user_id);
    	$obj_user->first_name = $request->first_name;
    	$obj_user->last_name = $request->last_name;
    	$arr_request = array();
    	$arr_request['first_name'] = $request->first_name;
    	$arr_request['last_name'] = $request->last_name;
    	if ($bool_include_email)
    	{
    		$obj_user->email = $request->email;
    		$arr_request['email'] = $request->email;
    	}
    	if ($bool_include_password)
    	{
    		$obj_user->password = $request->password;
    		$arr_request['password'] = $request->password;
    	}
    
    	$obj_user->save();
    	$user_id = $user->id;
    
    	$data = $admin->getDataArray(
    			$arr_request, $user_id,
    			$this->arr_logged_in_user);
    
    	return view('admin/edit_user_results_admin')->with('data', $data);
    }


    public function post_test_client(
    		Request $request,
    		Admin $admin,
    		Client $client,
    		Registration $registration,
    		CommonCode $cCode)
    		// 		CloakedClientId $cloakedClientId)
    {
    	echo "admin controller, line 1125, post_test_client called<br>";
    	$validation_rules = $admin->getValidationRulesTestClient();
    	$this->validate($request, $validation_rules);
    	$arr_request = $admin->getRequestArrayTestClient($request);
    	// this function was copied from three step, client info not necessary here
    	// use publisher as client
    	//    	$client->cloaked_client_id = $client->getNewCloakedClientId($user->id);
    	$obj_client = $client->where('id', $request->int_client_id)->first();
    	$obj_client->str_lead_destination_tested = $arr_request['str_lead_destination_tested'];
    	$obj_client->save();

    	$registration->propagateRegistration(
    			$arr_request['str_lead_destination_tested'],
    			$client, 
    			123456, 
    			$arr_request, 
    			'123.456.789.123'
    			);
   	 
   /* 	
    	$obj_client = $client->where('user_id', $arr_request['client_user_id'])->first();
    	if ($obj_client != null)
    		$client = $obj_client;
    	else
    		echo "no user found for client / user_id<br>";
    	$client->user_id = $arr_request['client_user_id'];
    	$client->str_email_two = $arr_request['str_email_two'];
    	$client->str_website = $arr_request['str_website'];
    	$client->str_crm = $arr_request['str_crm'];
    	$client->str_crm_url = $arr_request['str_crm_url'];
    	$client->str_lead_destination = $arr_request['str_lead_destination'];
    	$client->str_first_name = $arr_request['str_first_name'];
    	$client->str_last_name = $arr_request['str_last_name'];
    	$client->str_telephone_one = $arr_request['str_telephone_one'];
    	$client->str_telephone_two = $arr_request['str_telephone_two'];
    	$client->str_company = $arr_request['str_company'];
    	$client->str_city = $arr_request['str_city'];
    	$client->str_zip = $arr_request['str_zip'];
    	$client->int_state_id = $arr_request['int_state_id'];
    	$client->bool_active = $arr_request['bool_active'];
    	$client->bool_confirmed = $arr_request['bool_confirmed'];
    	$client ->save();
    	//    	$user_id = $user->id;
    	// return to raw password for view
    	//   	$arr_request['password'] = $request->password;
 */ 
    	$page_heading_content = "Test a client";
    	 
    	$data = $admin->getDataArrayTestClient(
    			$page_heading_content,
    			$arr_request,
    			$obj_client,
    			$this->arr_logged_in_user);
    	return view('admin/test_client')->with('data', $data);
    }

    

    public function post_test_post(
    		Admin $admin,
    		Test_post $test_post,
    		Request $request)  		// 		CloakedClientId $cloakedClientId)
    {
//    	$validation_rules = $admin->getValidationRulesTestClient();
//    	$this->validate($request, $validation_rules);
    	$arr_request = $admin->getRequestArrayTestPost($request);
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
    
    	$data = $admin->getDataArrayTestPost(
    			$page_heading_content,
    			$arr_request,
    			$test_post,
    			$this->arr_logged_in_user);
    	return view('admin/test_post_results')->with('data', $data);
    }
    
    
/*
    public function post_test_post(
    		Request $request)  		// 		CloakedClientId $cloakedClientId)
    {
    	//    	$validation_rules = $admin->getValidationRulesTestClient();
    	//    	$this->validate($request, $validation_rules);
    	$arr_request = $admin->getRequestArrayTestPost($request);
    	// this function was copied from three step, client info not necessary here
    	// use publisher as client
    	//    	$client->cloaked_client_id = $client->getNewCloakedClientId($user->id);
//    	$obj_client = $client->where('id', $request->int_client_id)->first();
//    	$obj_client->str_lead_destination_tested = $arr_request['str_lead_destination_tested'];
  //  	$obj_client->save();
 //  	$registration->propagateRegistration($client, 123456, $arr_request, '123.456.789.123');
    
    	/*
    	 $obj_client = $client->where('user_id', $arr_request['client_user_id'])->first();
    	if ($obj_client != null)
    		$client = $obj_client;
    	else
    		echo "no user found for client / user_id<br>";
    	$client->user_id = $arr_request['client_user_id'];
    	$client->str_email_two = $arr_request['str_email_two'];
    	$client->str_website = $arr_request['str_website'];
    	$client->str_crm = $arr_request['str_crm'];
    	$client->str_crm_url = $arr_request['str_crm_url'];
    	$client->str_lead_destination = $arr_request['str_lead_destination'];
    	$client->str_first_name = $arr_request['str_first_name'];
    	$client->str_last_name = $arr_request['str_last_name'];
    	$client->str_telephone_one = $arr_request['str_telephone_one'];
    	$client->str_telephone_two = $arr_request['str_telephone_two'];
    	$client->str_company = $arr_request['str_company'];
    	$client->str_city = $arr_request['str_city'];
    	$client->str_zip = $arr_request['str_zip'];
    	$client->int_state_id = $arr_request['int_state_id'];
    	$client->bool_active = $arr_request['bool_active'];
    	$client->bool_confirmed = $arr_request['bool_confirmed'];
    	$client ->save();
    	//    	$user_id = $user->id;
    	// return to raw password for view
    	//   	$arr_request['password'] = $request->password;
    	
    	$page_heading_content = "Test a post request results";
    
    	$data = $admin->dataArrayTestPost(
    			$page_heading_content,
    			$arr_request,
    			$obj_client,
    			$this->arr_logged_in_user);
    	return view('admin/test_client')->with('data', $data);
    }
*/    
    
    
	
}
