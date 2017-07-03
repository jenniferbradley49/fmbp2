<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
//use App\Models\LogEvent;
use App\Models\Role;
use App\Models\Role_user;
use Redirect;
use DB;
use Auth;
use App\Classes\RoleHelper;
use Storage;

class AjaxAuthController extends Controller
{
//	var $obj_logged_in_user;
//	var $arr_logged_in_user;
	var $bool_has_role;
	var $roleHelper;
	
	public function __construct(Role_user $role_user, RoleHelper $roleHelper)
	{
	//	Storage::put('ajax27.txt', 'ajax controller reached');
		$this->middleware('auth');
		if (Auth::check())
		{
		//	Storage::put('ajax31.txt', 'auth passed');
				
			$this->roleHelper = $roleHelper;
			$this->bool_has_role = $role_user->hasRole('admin');
		}  // end if Auth::check()
	} // end __construct function
		

	public function get_user_info_admin(Request $request, User $user)
	{
		if (!$this->bool_has_role)
		{
			return $this->roleHelper->call_redirect();
		}
		else
		{
			$validation_rules = [
			'user_id' => 'required|integer|min:1'
					];
			 
			$this->validate($request, $validation_rules);
	
			$obj_user = $user->where('id', $request->user_id)
			->first();
			return response()->json($obj_user);
		}
	}
	
/*	
	public function get_cloaked_client_id_admin(
			$user_id,
			Request $request, User $user
	)
	{
		if (!$this->bool_has_role)
		{
			return $this->roleHelper->call_redirect();
		}
		else
		{
			$validation_rules = [
			'user_id' => 'required|integer|min:1'
					];
			 
			$this->validate($request, $validation_rules);
	
			return $user->where('id', $request->user_id)
			->first()->cloakedClientId();
			//    		return response()->json($obj_user);
		}
	}
*/	
	
	public function resort_users_admin(Request $request, User $user)
	{
		if (!$this->bool_has_role)
		{
			return $this->roleHelper->call_redirect();
		}
		else
		{
			$validation_rules = [
			'bool_order_by_lname' => 'required|integer|min:0|max:1'
					];
			 
			$this->validate($request, $validation_rules);
	
			$arr_users_processed = array(0 => array('id' => 0, 'content' => "please choose an option"));
			//			$user = new User;
			$arr_users_raw = $user->get_all_users_admin($request->bool_order_by_lname);  // 1 specifies order by last name
	
			$counter = 1;
			foreach ($arr_users_raw as $user)
			{
				if ($request->bool_order_by_lname)
				{
					$str_info = $user['last_name']. ', ';
					$str_info .= $user['first_name']. ' ';
					$str_info .= $user['email'];
				}
				else
				{
					$str_info = $user['email'].' ';
					$str_info .= $user['last_name']. ', ';
					$str_info .= $user['first_name'];
				}
				$arr_users_processed[$counter]['content'] = $str_info;
				$arr_users_processed[$counter]['id'] = $user['id'];
				$counter ++;
	
			}
			return response()->json($arr_users_processed);
		}
	}
	
	
	public function get_role_info_admin(
			Request $request,
			Role $role,
			Role_user $role_user)
	{
		//  	Storage::put('ajax109.txt', 'ajax get_role_info reached');
	
		if (!$this->bool_has_role)
		{
			//	Storage::put('ajax113.txt', 'ajax controller reached');
			return $this->roleHelper->call_redirect();
		}
		else
		{
			//	Storage::put('ajax115.txt', 'ajax controller reached');
			$validation_rules = [
			'user_id' => 'required|integer|min:1'
					];
			 
			$this->validate($request, $validation_rules);
	
			$arr_all_roles = $role->all();
			$arr_roles_possessed = $role_user->get_roles_possessed($request->user_id);
			$arr_roles_possessed = $role_user->process_roles_possessed_output($arr_roles_possessed);
			$arr_roles_available = $role_user->get_roles_available($request->user_id);
			$data = array('arr_roles_possessed' => $arr_roles_possessed,
					'arr_roles_available' => $arr_roles_available
			);
			//		Storage::put('ajax132.txt', response()->json($data));
	
			return response()->json($data);
		}
	}
	
	
	
}
