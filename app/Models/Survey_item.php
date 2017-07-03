<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey_item extends Model
{
	
	public function survey_question()
	{
		return $this->belongsTo('App\Models\Survey_question');
	}
	
	
}
