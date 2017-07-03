<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Client;
use App\Models\Role;
use App\Models\Role_user;
use App\Models\CloakedClientId;
use App\Models\PublicPages;
use Hash;
use Redirect;
use DB;
use Auth;
use App\Classes\RoleHelper;
//use App\classes\Communication;
use App\Classes\CommonCode;

class ClientController extends Controller
{
	var $obj_logged_in_user;
	var $arr_logged_in_user;
	var $bool_has_role;
	var $roleHelper;
	var $cloakedClientId;
	
	public function __construct(
			Role_user $role_user, 
			User $user,
			Client $client,
			RoleHelper $roleHelper)
	{

//		$this->middleware('three_step:admin');
//		$this->middleware('three_step');
		$this->middleware('auth');
		if (Auth::check())
		{
//			$objClient = $user
//			->where('id', Auth::user()->id)
//		->first()->client()->first();
//			$this->cloakedClientId = $objClient->cloaked_client_id;
			$this->middleware('role:agent');
			//			$this->obj_logged_in_user = Auth::user();
echo "client controller, line 49, auth:user>id = ";
echo Auth::user()->id;
echo "<br>";
			$this->arr_logged_in_user = $client->getClientInfo(Auth::user()->id, Auth::user()->email);
//$this->arr_logged_in_user['email'] = 'test@test.com';
//$this->arr_logged_in_user['last_name'] = 'test';
//$this->arr_logged_in_user['first_name'] = 'test_first';
//$this->arr_logged_in_user['cloaked_client_id'] = 'test_cloaked_client_id';
echo "client controller, line 57, results from getClientInfo<br>";
print_r($this->arr_logged_in_user);
echo "<br>";
//			$this->cloakedClientId = $this->arr_logged_in_user['cloaked_client_id'];
		}  // end if Auth::check()
	} // end __construct function
		
	
    public function index(Client $client, PublicPages $publicPages)
    {
    	$dataClient = $client->getDataArrayGetIndex(
    			$this->arr_logged_in_user);
		$page_heading_content = "Client Dashboard";
		$dataPublic = $publicPages->getDataArrayGetPublicPage($page_heading_content);
		$data = array_merge($dataClient, $dataPublic);
echo "client controller, line 72, ";		
print_r($data);		
    	return view('client/dashboard')->with('data', $data);
    }

    
    public function getEditLeadVars(
    		Client $client,
    		User $user,
    		PublicPages $publicPages
    )
    {
    	$dataLeadVars = $client->getDataArrayGetEditLeadVars(
    			$this->arr_logged_in_user);
    	$page_heading_content = "Edit the variable names for your CRM";
    	$dataPublic = $publicPages->getDataArrayGetPublicPage($page_heading_content);
    	$data = array_merge($dataLeadVars, $dataPublic);
    	return view('client/edit_lead_vars')->with('data', $data);
    }
    
    
 /*   
    public function getEditClient(
    		Client $client,
    		User $user,
    		PublicPages $publicPages
    		)
    {
    	$dataClient = $client->getDataArrayGetEditClient(
    			$this->arr_logged_in_user);
		$page_heading_content = "Edit your profile";
		$dataPublic = $publicPages->getDataArrayGetPublicPage($page_heading_content);
		$data = array_merge($dataClient, $dataPublic);
    	return view('client/edit_client')->with('data', $data);
    }
  */  

    public function postEditClient(
    		Request $request,
    		User $user, 
    		Client $client, 
    		CommonCode $cCode, 
    		PublicPages $publicPages)
    {
 //   	$bool_include_password = $cCode->setCheckboxVar($request->include_password);
 //   	$bool_include_email = $cCode->setCheckboxVar($request->include_email);
    
    	$validation_rules = $client->getValidationRulesEditUser();
 //   	$validation_messages = $client->getValidationMessagesEditUser();
    	$this->validate($request, $validation_rules);

    	$arr_request = $client->getRequestArrayEditUser($request);
    	$user = $user->find(Auth::user()->id);
//    	$user = $cCode->getObject($arr_request, $user);			
//    	$user->first_name = $arr_request->first_name;
//    	$user->last_name = $arr_request->last_name;
 //   	$user->company = $arr_request->company;
//    	$arr_request = array();
 //   	// transfer to new array, so as not to propagate teh password
//    	$arr_request['first_name'] = $request->first_name;
//    	$arr_request['last_name'] = $request->last_name;
//    	$arr_request['company'] = $request->company;
    	 
//		$user->email = $arr_request['email'];
//		$user->password = $arr_request['password'];
//		$user->name = '';
//		$user->save();
		$client = $client->where('user_id', Auth::user()->id)->first();
    	if ($client)
		{
//   		$client->str_cloaked_client_id = $client->getNewCloakedClientId($user->id);
//    		$client->user_id = $user->id;
    		$client->str_first_name = $arr_request['first_name'];
    		$client->str_last_name = $arr_request['last_name'];
    		$client->str_company = $arr_request['company'];
    		$client->str_client_url = $arr_request['client_url'];
    		$client->save();
    	//    	$user_id = $user->id;
    
    		$dataClient = $client->getDataArrayPostEditUser(
    			$arr_request, $user->id,
//    			$this->cloakedClientId,
    			$this->arr_logged_in_user 
//    			$partialDirector->getNavbarRightClient()
    			);
    		$page_heading_content = "Edit your profile - results";
    		$dataPublic = $publicPages->getDataArrayGetPublicPage($page_heading_content);
    		$data = array_merge($dataClient, $dataPublic);
    	 
    		return view('client/edit_user_results')->with('data', $data);
    	}
    	else
    	{
    		$dataClient = $client->getDataArrayPostEditUser(
    			$arr_request, $user->id,
//    			$this->cloakedClientId,
    			$this->arr_logged_in_user 
//    			$partialDirector->getNavbarRightClient()
    			);
    		$page_heading_content = "Edit your profile - results";
    		$dataPublic = $publicPages->getDataArrayGetPublicPage($page_heading_content);
    		$data = array_merge($dataClient, $dataPublic);
//    		$page_heading_content = "Edit your profile - results";
 //   		$data = $publicPages->getDataArrayGetPublicPage($page_heading_content);
    		return view('client/no_client')->with('data', $data);
    	}
    }    
}





