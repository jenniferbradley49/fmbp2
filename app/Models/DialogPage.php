<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DialogPage extends Model
{
	
    public function getDataArrayGetDialogForm()
    {
    	return array(
    		'input_old' =>array(
//    					'first_name' => Input::old('first_name'),
//    					'last_name' => Input::old('last_name'),
//    					'company' => Input::old('company'),
 //   					'client_url' => Input::old('client_url'),
 //   					'email' => Input::old('email')
    			)		    
    		);
    }
    
	//
}
