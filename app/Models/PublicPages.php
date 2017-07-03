<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PublicPages extends Model
{

    public function getDataArrayGetPublicPage($page_heading_content)
    {
    	return array('page_heading_content' => $page_heading_content);
    }
    
}
