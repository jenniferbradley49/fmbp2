<?php

use Illuminate\Database\Seeder;
use App\Models\Survey_project;

class Survey_projectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('survey_projects')->delete();
    	Survey_project::create(array(
    	'str_text'     => 'publish'
    			));
    	 
    }
}
