<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	// builds Eloquent relationship to associate users with roles
	public function users()
	{
		return $this->belongsToMany('App\User');
	}
	
}
