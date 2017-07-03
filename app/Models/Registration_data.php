<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration_data extends Model
{
	protected $table = 'registration_data';
    //

	public function registration()
	{
		return $this->belongsTo('App\Models\Registration');
	}
	
	
}
