<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;


class Client extends Model
{
	// builds Eloquent relationship to associate users with roles
	public function registrations()
	{
		return $this->belongsToMany('App\Models\Registration');
	}
	
	public function user()
	{
		return $this->belongsTo('App\User');
	}
	
	public function getValidationRulesEditUser()
	{
		return array(
				'first_name' => 'required|max:50',
				'last_name' => 'required|max:50',
				'company' => 'required|max:50',
				'client_url' => 'required'
		);
	}
	
	
	public function getRequestArrayEditUser($request)
	{
		return array(
				'first_name' => $request->first_name,
				'last_name' => $request->last_name,
				'company'    => $request->company,
				'client_url'    => $request->client_url
		);
	}


	public function getDataArrayGetEditLeadVars($arr_logged_in_user)
	{
		return array(
				'input_old' =>array(
						'first_name' => Input::old('first_name', $arr_logged_in_user['first_name']),
						'last_name' => Input::old('last_name', $arr_logged_in_user['last_name']),
						'company' => Input::old('company', $arr_logged_in_user['company']),
						'client_url' => Input::old('client_url', $arr_logged_in_user['client_url']),
				),
				//				'cloaked_client_id' => $cloaked_client_id,
				'arr_logged_in_user' => $arr_logged_in_user
				//			'navbar_right' => $navbar_right
		);
	}
	
	
	
	public function getDataArrayGetEditClient($arr_logged_in_user)
	{
		return array(
				'input_old' =>array(
						'str_first_name' => Input::old('str_first_name', $arr_logged_in_user['first_name']),
						'str_last_name' => Input::old('str_last_name', $arr_logged_in_user['last_name']),
						'str_company' => Input::old('str_company', $arr_logged_in_user['company']),
						'str_' => Input::old('str_', $arr_logged_in_user['company']),
						'str_website' => Input::old('str_website', $arr_logged_in_user['client_url']),
				),
				//				'cloaked_client_id' => $cloaked_client_id,
				'arr_logged_in_user' => $arr_logged_in_user
				//			'navbar_right' => $navbar_right
		);
	}
	
	
	public function getDataArrayGetIndex($arr_logged_in_user)
	{
		return array(
				'arr_logged_in_user' => $arr_logged_in_user
				//				'navbar_right' => $navbar_right
		);
	}
	
	
	public function getDataArrayPostEditUser(
			$arr_request, $user_id,
			//			$cloaked_client_id,
			$arr_logged_in_user
			//			$navbar_right
	)
	{
		return array(
				'arr_request' => $arr_request,
				'user_id' => $user_id,
				//				'cloaked_client_id' => $cloaked_client_id,
				'arr_logged_in_user' => $arr_logged_in_user
				//				'navbar_right' => $navbar_right
		);
	}
	
	
	public function getNewCloakedClientId()
	{
		// check database for pre-existing instance of this ID
		$objClient = "dummy val";
		while ($objClient != null)
		{
			$new_cloaked_client_id = str_random(10);
			$objClient = $this->getObjClient($new_cloaked_client_id);
			//			->where('cloaked_client_id', $new_cloaked_client_id)
			//			->first();
		}
		return $new_cloaked_client_id;
	}
	
	public function clientIdIsNotValid($cloaked_client_id)
	{
		$objClient = $this->getObjClient($cloaked_client_id);
		return ($objClient == null);
	}
	//
	//	public function getUserID($cloaked_client_id)
	//	{
	//		$objClient = $this->getObjClient($cloaked_client_id);
	//		return $objClient->user_id;
	//	}
	
	//	public function getObjByCloakedId($cloaked_client_id)
	//	{
	//		return $this
	//		->where('cloaked_client_id', $cloaked_client_id)
	//		->first();
	//	}
	
	
	public function getClientInfo($user_id, $email)
	{
		$objClient = $this
		->where('user_id', $user_id)
		->first();
	
		if ($objClient != null)
		{
			return array(
					'email'		=> $email,
					'last_name' => $objClient->last_name,
					'first_name' => $objClient->first_name,
					'company' => $objClient->company,
					'client_url' => $objClient->client_url,
					'cloaked_client_id'	=>$objClient->cloaked_client_id
			);
		}
		else
		{
			return array();
		}
	
	}
	

	public function getClientLeadVars($user_id)
	{
		$objClient = $this
		->where('user_id', $user_id)
		->first();
	
		if ($objClient != null)
		{
			return array(
					'str_email_lead'		=> $objClient->str_email_lead,
					'str_first_name_lead' => $objClient->str_first_name_lead,
					'str_last_name_lead' => $objClient->str_last_name_lead,
					'str_address_one_lead' => $objClient->str_address_one_lead,
					'str_address_two_lead' => $objClient->str_address_two_lead,
					'str_city_lead' => $objClient->str_city_lead,
					'str_zip_lead' => $objClient->str_zip_lead,
					'str_state_lead'	=> $objClient->str_state_lead,
					'str_genre_lead' => $objClient->str_genre_lead,
					'str_schedule_lead' => $objClient->str_schedule_lead,
					'str_age_lead' => $objClient->str_age_lead,
					'str_contact_time_lead' => $objClient->str_contact_time_lead,
					'str_formats_lead' => $objClient->str_formats_lead,
					'str_salutation_lead' => $objClient->str_salutation_lead,
			);
		}
		else
		{
			return array();
					}
	
	}
	
	
	
	public function getObjClient($str_cloaked_client_id)
	{
		//		echo "client model,line 82, cloaked client id = $cloaked_client_id<br>";
		return $this
		->where('str_cloaked_client_id', $str_cloaked_client_id)
		->first();
	}

	public function prepare_clients_for_select($obj_clients_raw)
	{
//		echo "in prepare clients for select<br>";
//		echo "<pre>";
//				var_dump($obj_clients_raw);
//		echo "</pre>";
				$arr_clients_processed = array(0 => "please choosse an option");
	
		foreach ($obj_clients_raw as $client_rw)
		{
			echo "user_id = ".$client_rw->user_id;
			echo "<br>";
			echo "str_first_name = ".$client_rw->str_first_name;
			echo "<br>";
			$str_info = "";
			$str_info .= $client_rw->str_company . ',x ';
			$str_info .= $client_rw->str_last_name . ', ';
			$str_info .= $client_rw->str_first_name . ', ';
			$str_info .= $client_rw->user_id. ' ';
			//			$str_info .= $client['str_email'];
			$arr_clients_processed[$client_rw->user_id] = $str_info;
		}
	
		return $arr_clients_processed;
	
	}  // end function process_users
	
	
    //
}
