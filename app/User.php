<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    // builds Eloquent relationship to associate roles with users
    public function roles()
    {
    	return $this->belongsToMany('App\Models\Role');
    }
    
    
    public function clients()
    {
    	return $this->hasOne('App\Models\Client');
    }
    
    
    public function get_all_users_admin($bool_order_by_lname)
    {
    	//   	echo "<br>in model, bool_order_by_lname = ".$bool_order_by_lname;
    	if ($bool_order_by_lname)
    	{
    		//  		echo "<br>in model, returned by last name<br>";
    		return $this->orderBy('last_name')->get();
    	}
    	else
    	{
    		//   		echo "<br>in model, returned by email<br>";
    		return $this->orderBy('email')->get();
    	}
    } // end function get_all_users_admin
    
    
    public function process_users($arr_users_raw)
    {
    	$arr_users_processed = array(0 => "please choose an option");
    
    	foreach ($arr_users_raw as $user)
    	{
    		$str_info = $user['last_name']. ', ';
    		$str_info .= $user['first_name']. ' ';
    		$str_info .= $user['email'];
    		$arr_users_processed[$user['id']] = $str_info;
    	}
    
    	return $arr_users_processed;
    
    }  // end function process_users
    

    public function get_users_wo_client($arr_users_raw, $obj_all_clients)
    {
    	// rearrange obj_all_clients to focus on user_id
    	$arr_all_clients = array();
    	foreach ($obj_all_clients as $client)
    	{
    		$arr_all_clients[$client->user_id] = $client->user_id;
    	}
    	$arr_users_wo_client= array();
    	
    	foreach ($arr_users_raw as $user_raw)
    	{
    		if (!array_key_exists($user_raw->id, $arr_all_clients))
    		{
    			$arr_users_wo_client[] = $user_raw;
    		}	
    	}
    		
    	return $arr_users_wo_client;
    }
    
    
}
