<?php

use Illuminate\Database\Seeder;
use App\Models\State;

class states_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('states')->delete();
    	State::create(array(
    		'str_abbrev'     => 'AL',
    		'str_text'     => 'Alabama'
    	));
    	
    	State::create(array(
    		'str_abbrev'     => 'AK',
    		'str_text'     => 'Alaska'
    	));
    	 

    	State::create(array(
	    	'str_abbrev'     => 'AZ',
	    	'str_text'     => 'Arizona'
    	));
    	

    	State::create(array(
    		'str_abbrev'     => 'AR',
    		'str_text'     => 'Arkansas'
    	));
    	 

    	State::create(array(
    		'str_abbrev'     => 'CA',
    		'str_text'     => 'California'
    	));
    	

    	State::create(array(
    	'str_abbrev'     => 'CO',
    	'str_text'     => 'Colorado'
    			));
    	
    	
    	State::create(array(
    	'str_abbrev'     => 'CT',
    	'str_text'     => 'Connecticut'
    			));
    	 

    	State::create(array(
    	'str_abbrev'     => 'DE',
    	'str_text'     => 'Delaware'
    			));
    	
    	
    	State::create(array(
    	'str_abbrev'     => 'DC',
    	'str_text'     => 'District of Columbia'
    			));
    	 
    	
    	State::create(array(
    	'str_abbrev'     => 'FL',
    	'str_text'     => 'Florida'
    			));
    	 
    	 
    	State::create(array(
    	'str_abbrev'     => 'GA',
    	'str_text'     => 'Georgia'
    			));
    	

    	State::create(array(
    	'str_abbrev'     => 'HI',
    	'str_text'     => 'Hawaii'
    			));
    	
    	
    	State::create(array(
    	'str_abbrev'     => 'ID',
    	'str_text'     => 'Idaho'
    			));
    	 
    	
    	State::create(array(
    	'str_abbrev'     => 'IL',
    	'str_text'     => 'Illinois'
    			));
    	 
    	 
    	State::create(array(
    	'str_abbrev'     => 'IN',
    	'str_text'     => 'Indiana'
    			));
    	
    	
    	State::create(array(
    	'str_abbrev'     => 'IA',
    	'str_text'     => 'Iowa'
    			));
    	 
    	 
    	State::create(array(
    	'str_abbrev'     => 'KS',
    	'str_text'     => 'Kansas'
    			));
    	
    	 
    	State::create(array(
    	'str_abbrev'     => 'KY',
    	'str_text'     => 'Kentucky'
    			));
    	
    	
    	State::create(array(
    	'str_abbrev'     => 'LA',
    	'str_text'     => 'Louisiana'
    			));
    	 

    	State::create(array(
    	'str_abbrev'     => 'ME',
    	'str_text'     => 'Maine'
    			));
    	
    	
    	State::create(array(
    	'str_abbrev'     => 'MD',
    	'str_text'     => 'Maryland'
    			));
    	 
    	
    	State::create(array(
    	'str_abbrev'     => 'MA',
    	'str_text'     => 'Massachusetts'
    			));
    	 
    	 
    	State::create(array(
    	'str_abbrev'     => 'MI',
    	'str_text'     => 'Michigan'
    			));
    	
    	
    	State::create(array(
    	'str_abbrev'     => 'MN',
    	'str_text'     => 'Minnesota'
    			));
    	 
    	 
    	State::create(array(
    	'str_abbrev'     => 'MS',
    	'str_text'     => 'Mississippi'
    			));
    	
    	 
    	State::create(array(
    	'str_abbrev'     => 'MO',
    	'str_text'     => 'Missouri'
    			));
    	
    	
    	State::create(array(
    	'str_abbrev'     => 'MT',
    	'str_text'     => 'Montana'
    			));
    	 

    	State::create(array(
    	'str_abbrev'     => 'NE',
    	'str_text'     => 'Nebraska'
    			));
    	
    	
    	State::create(array(
    	'str_abbrev'     => 'NV',
    	'str_text'     => 'Nevada'
    			));
    	 
    	
    	State::create(array(
    	'str_abbrev'     => 'NH',
    	'str_text'     => 'New Hampshire'
    			));
    	 
    	 
    	State::create(array(
    	'str_abbrev'     => 'NJ',
    	'str_text'     => 'New Jersey'
    			));
    	
    	
    	State::create(array(
    	'str_abbrev'     => 'NM',
    	'str_text'     => 'New Mexico'
    			));
    	 
    	 
    	State::create(array(
    	'str_abbrev'     => 'NY',
    	'str_text'     => 'New York'
    			));
    	
    	 
    	State::create(array(
    	'str_abbrev'     => 'NC',
    	'str_text'     => 'North Carolina'
    			));
    	
    	
    	State::create(array(
    	'str_abbrev'     => 'ND',
    	'str_text'     => 'North Dakota'
    			));
    	 

    	State::create(array(
    	'str_abbrev'     => 'OH',
    	'str_text'     => 'Ohio'
    			));
    	
    	
    	State::create(array(
    	'str_abbrev'     => 'OK',
    	'str_text'     => 'Oklahoma'
    			));
    	 
    	
    	State::create(array(
    	'str_abbrev'     => 'OR',
    	'str_text'     => 'Oregon'
    			));
    	 
    	 
    	State::create(array(
    	'str_abbrev'     => 'PA',
    	'str_text'     => 'Pennsylvania'
    			));
    	
    	
    	State::create(array(
    	'str_abbrev'     => 'RI',
    	'str_text'     => 'Rhode Island'
    			));
    	 
    	 
    	State::create(array(
    	'str_abbrev'     => 'SC',
    	'str_text'     => 'South Carolina'
    			));
    	
    	 
    	State::create(array(
    	'str_abbrev'     => 'SD',
    	'str_text'     => 'South Dakota'
    			));
    	
    	
    	State::create(array(
    	'str_abbrev'     => 'TN',
    	'str_text'     => 'Tennessee'
    			));
    	 

    	State::create(array(
    	'str_abbrev'     => 'TX',
    	'str_text'     => 'Texas'
    			));
    	
    	
    	State::create(array(
    	'str_abbrev'     => 'UT',
    	'str_text'     => 'Utah'
    			));
    	 
    	
    	State::create(array(
    	'str_abbrev'     => 'VT',
    	'str_text'     => 'Vermont'
    			));
    	 
    	 
    	State::create(array(
    	'str_abbrev'     => 'VA',
    	'str_text'     => 'Virginia'
    			));
    	
    	
    	State::create(array(
    	'str_abbrev'     => 'WA',
    	'str_text'     => 'Washington'
    			));
    	 
    	 
    	State::create(array(
    	'str_abbrev'     => 'WV',
    	'str_text'     => 'West Virginia'
    			));
    	
    	 
    	State::create(array(
    	'str_abbrev'     => 'WI',
    	'str_text'     => 'Wisconsin'
    			));
    	
    	
    	State::create(array(
    	'str_abbrev'     => 'WY',
    	'str_text'     => 'Wyoming'
    			));

    	State::create(array(
    	'str_abbrev'     => 'AS',
    	'str_text'     => 'American Samoa'
    			));
    	
    	
    	State::create(array(
    	'str_abbrev'     => 'GU',
    	'str_text'     => 'Guam'
    			));
    	 
    	
    	State::create(array(
    	'str_abbrev'     => 'PR',
    	'str_text'     => 'Puerto Rico'
    			));
    	 
    	 
    	State::create(array(
    	'str_abbrev'     => 'AP',
    	'str_text'     => 'US Military'
    			));
    	
  	 
    	 
        //
    }
}
