<?php

use Illuminate\Database\Seeder;
use App\Models\Salutation;

class salutations_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('salutations')->delete();
    	Salutation::create(array(
    	'str_text'     => 'Mr.'
    			));
    	 
    	Salutation::create(array(
    	'str_text'     => 'Mrs.'
    			));
    	
    	Salutation::create(array(
    	'str_text'     => 'Ms.'
    			));
    	
    	Salutation::create(array(
    	'str_text'     => 'Miss.'
    			));

    	Salutation::create(array(
    	'str_text'     => 'Dr.'
    			));
    	    	
    	 
        //
    }
}
