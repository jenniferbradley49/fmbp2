<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey_project extends Model
{

	// eloquent relationship with client_id
	public function survey_questions()
	{
		return $this->hasMany('App\Models\Survey_question');
	}

	public function get_project_id($str_project)
	{
		$obj_sp = $this->where('str_text', $str_project)->first();
		return $obj_sp->id;
	}
    //
}
