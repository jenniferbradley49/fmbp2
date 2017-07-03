<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\Registration;

class Client_registration extends Model
{

	protected $table = 'client_registration';
	
	protected $fillable = ['registration_id', 'client_id'];
	
//	public function add_registration($client_id, $registration_id)
	public function addRegistration(Client $client, $registration_id)
	{
//		$client = Client::find($client_id);
		$client->registrations()->attach($registration_id);
	}
	
	public function add_registration_by_name($client_id, $assigned_registration, Registration $registration)
	{
		$registration = $registration->where('name', $assigned_registration)->first();
		if ($registration != null)
		{
			$this->add_registration($client_id, $registration->id);
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	public function delete_registration($client_id, $registration_id)
	{
		$client = Client::find($client_id);
		$client->registrations()->detach($registration_id);
	}
	
	public function hasRegistration($int_registration_id, $client)
	{
//		$client = Auth::user();
// legacy code from role_user
/*		$arr_raw = $client->registrations->toArray();
		$arr_processed = array();
		foreach ($arr_raw as $val )
		{
			$arr_processed[$val['id']] = $val['name'];
		}
		return in_array($registration_to_check, $arr_processed, true);
		*/
		$registration = $client->registrations()->find($int_registration_id);
		return ($registration == null)?0:1;
	}
	
/*	
	public function get_registrations_possessed($client_id)
	{
		$client = Client::find($client_id);
		$arr_registrations_possessed = $client->registrations->toArray();
	
		return $arr_registrations_possessed;
	}
	
	
	public function process_registrations_possessed_output($arr_registrations_possessed)
	{
		if (empty($arr_registrations_possessed))
		{
			$arr_registrations_possessed[0]['id'] = 0;
			$arr_registrations_possessed[0]['name'] = "no registrations currently possessed";
		}
	
		return $arr_registrations_possessed;
	}
	
	public function process_registrations_possessed_comparison($arr_registrations_possessed)
	{
		$arr_registrations_possessed_keys = array();
		if (empty($arr_registrations_possessed))
		{
			$arr_registrations_possessed_keys[] = 0;
		}
		else
		{
			foreach ($arr_registrations_possessed as $key => $registration_possessed)
			{
				$arr_registrations_possessed_keys[] = $registration_possessed['id'];
			}
		}
			
		return $arr_registrations_possessed_keys;
	}
	
	
	public function get_registrations_available($client_id)
	{
		$arr_registrations_possessed = $this->get_registrations_possessed($client_id);
		$arr_registrations_possessed_keys = $this->process_registrations_possessed_comparison($arr_registrations_possessed);
		$arr_registrations_available = DB::table('registrations')
		->whereNotIn('id', $arr_registrations_possessed_keys)
		->get();
		return $arr_registrations_available;
	}
*/	
    //
}
