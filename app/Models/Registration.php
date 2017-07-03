<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Survey_item;
use Mail;
use App\Models\Registration_data;

class Registration extends Model
{
	// builds Eloquent relationship to associate users with roles
	public function clients()
	{
		return $this->belongsToMany('App\Models\Client');
	}
	// eloquent relationship with registration_data
	public function registration_data()
	{
		return $this->hasMany('App\Models\Registration_data');
	}
	
	
	public function prepare_data(
			$arr_request,
			$str_ip_address,
			$int_public_id			
			)
			{
				$arr_data = array();
				$arr_data['int_public_id'] = $int_public_id;
				$arr_data['str_ip_address'] = $str_ip_address;
				foreach ($arr_request as $key => $item)
				{
					$arr_data[$key] = $item;
				}
				return $arr_data;
					
				
			}
	
    
    public function save_registration(
    		$arr_request, $str_ip_address, 
    		$int_public_id, $survey_project_id)
    {
//    	echo 'in save_registration, line 46<br>';
//    	echo '<pre>';
//    	print_r($arr_request);
 //   	echo '</pre>';
    	//    	echo "bool_include = ".$arr_request['bool_include']."<br>";
    	// I did not use the laravel eloquent create,
    	// as there is an expectation of hacking, and mass assignment
    	// invites hacking.  The $arr_request array has already been specifically assigned
    	// in getRequestArray()
    	$this->survey_project_id = $survey_project_id;
    	$this->int_public_id = $int_public_id;
    	$this->str_ip_address = $str_ip_address;
    	$this->save();
    	$int_registration_id = $this->id;
    		
		$registration = $this->find($int_registration_id);
    	foreach ($arr_request as $key => $val)
    	{
    		$this->save_registration_data($key, $val);
// 			$registration_data = new Registration_data;			
//    		$registration_data->str_col_name = $key;
//    		$registration_data->str_value = $val;
//    		$registration->registration_data()->save($registration_data);   	
    	}
    	// add IP
    	$this->save_registration_data('str_ip_address', $str_ip_address);
//    	$registration_data = new Registration_data;
//    	$registration_data->str_col_name = 'str_ip_address';
//    	$registration_data->str_value = $str_ip_address;
//    	$registration->registration_data()->save($registration_data);

    	// add survey project id
    	$this->save_registration_data('survey_project_id', $survey_project_id);
//    	$registration_data = new Registration_data;
 //   	$registration_data->str_col_name = 'survey_project_id';
//    	$registration_data->str_value = $survey_project_id;
//    	$registration->registration_data()->save($registration_data);

    	// add public id
    	$this->save_registration_data('int_public_id', $int_public_id);
//    	$registration_data = new Registration_data;
//    	$registration_data->str_col_name = 'int_public_id';
//    	$registration_data->str_value = $int_public_id;
//    	$registration->registration_data()->save($registration_data);
    	 
    	return $int_registration_id;
    	 
    }
    
    public function save_registration_data(
//    		Registration_data $registration_data, 
			$str_col_name,
    		$str_value
    		)
    {
    	$registration_data = new Registration_data;    		
    	$registration_data->str_col_name = $str_col_name;
    	$registration_data->str_value = $str_value;
    	$this->registration_data()->save($registration_data);   	 
    }

    
    public function record_registration(
    		Client $client,
    		Client_registration $client_registration,
    		PublicForm $publicForm,
    		$arr_data,
//    		$arr_request, 
//    		$str_ip_address, 
    		$int_registration_id
//    		$int_public_id   		
    		)
    {
    	$obj_all_active_clients = $client->where('bool_active', 1)->get();
    	foreach ($obj_all_active_clients as $client)
    	{
    		//here check if client has paid for leads
//    		if ($client->int_real_time_leads_received > $client->int_real_time_leads_paid)
//    		{
    			if (!$client_registration->hasRegistration(
    					$int_registration_id, $client))
    			{
    				// here complete web to form to send lead
    				// assuming no failure in web lead to form, record in database
    				$client_registration->addRegistration(
    						$client, 
    						$int_registration_id);
					$this->propagateRegistration(
							$client,
							$publicForm,
							$arr_data,
		//					$arr_request,  
		//					$str_ip_address,
							$int_registration_id
		//					$int_public_id
					);
    			}
   // 		} // end if ($client->int_real_time_leads_received > $client->int_real_time_leads_paid)
    	
    	}
    }
    

    public function propagateRegistration(
//    		$str_lead_destination, 
    		Client $client,
    		PublicForm $publicForm,
    		$arr_data,
//    		$arr_request, 
//    		$str_ip_address, 
    		$int_registration_id
//    		$int_public_id   		
    		)
    {
//    	echo "registration, line 141 ";
//    	echo "client->bool_delivery_crm ".$client->bool_delivery_crm."<br>";
    	
//    	echo "<br><br>registration model, line 144<br>";
//    	echo "<pre>";
 //   	print_r($arr_data);
//    	echo "</pre>";
    	 
    	// determines whether client wants delivery by email or CRM
    	if (isset($client->bool_delivery_crm))
    	{
    		if ($client->bool_delivery_crm)
    		{
    			$bool_delivery_crm = 1;
    		}
    		else 
    		{
    			$bool_delivery_crm = 0;
    		}
    	}
    	else 
    	{
    		$bool_delivery_crm = 0;
    	}
    
    	if (!$bool_delivery_crm)
    	{ 
//  echo "<br><br>in registration model, line 153<br>";
//  echo "admin email = ".$publicForm->adminEmail."<br><br><br>";
  
    		$publicForm->boolSendMail(
    				'publish_registration',  // views/emails/template
    				$arr_data,	// data to be sent
    				$publicForm->senderEmail, // email sender
// the commented out line (next), is the real recipient
// but as of 170607, a validated mailgun domain will still not send to 
// any email except the login email
//    				$client->str_delivery_email, // email recipient
    				$publicForm->adminEmail, // email recipient
    				$publicForm->leadFromUsSubject // eail subject
    		);
    		
    	}
    	echo "in Registration model, line 160, str_lead_destination = $client->str_lead_destination<br>";
/*    	 
    	// Initialize Guzzle client
    	$guzzleClient = new \GuzzleHttp\Client();

// cannot abort execution for an error, just log, report to browser, and continue
    	try 
    	{
    		 
    	// Create a POST request
    		$response = $guzzleClient->request(
    			'POST',
    			$client->str_lead_destination,
    			[
    				'form_params' => [
//    				'key1' => 'value1',
 //   				'key2' => 'value2'
 					$arr_data
    				]
    			]
    		);
    	
    	// Parse the response object, e.g. read the headers, body, etc.
    		$headers = $response->getHeaders();
    		$body = $response->getBody();
    	
    	// Output headers and body for debugging purposes
    		echo "client id = ".$client->id."<br>";
    		var_dump($headers, $body);
    		echo "<br><br>";
    	} 
    	catch (Exception $e) 
    	{
    		echo "client id = ".$client->id."<br>";
    		echo 'Caught exception: ',  $e->getMessage(), "<br><br>";
    	}
 */  
    }
    
    
    public function gen_public_id()
    {
    	do 
    	{
    		$int_test = mt_rand(10000000, 99999999);
    		$obj_registration = $this->where('int_public_id', $int_test)->first();
    	} while($obj_registration != null);
    	return $int_test;
    }
    
    
    
}
