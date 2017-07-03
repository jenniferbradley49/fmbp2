<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
	Public $timestamps = false;
	
	Public function get_states()
	{
		$temps = $this->all();
		$arr_temps = array();
		foreach ($temps as $temp)
		{
			$arr_temps[$temp->id] = $temp->str_text;
		}
		return $arr_temps;
	}
	
	
}
