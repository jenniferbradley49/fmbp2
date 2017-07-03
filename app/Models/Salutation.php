<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salutation extends Model
{
    Public $timestamps= false;
    
    Public function get_salutations()
    {
    	$salutations = $this->all();
    	$arr_salutations = array();
    	foreach ($salutations as $salutation)
    	{
    		$arr_salutations[$salutation->id] = $salutation->str_text;
    	}
    	return $arr_salutations;
    }
}
