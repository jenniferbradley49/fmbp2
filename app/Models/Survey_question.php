<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey_question extends Model
{

    // eloquent relationship with client_id
    public function survey_items()
    {
    	return $this->hasMany('App\Models\Survey_item');
    }


    public function survey_project()
    {
    	return $this->belongsTo('App\Models\Survey_project');
    }
    
    
}
