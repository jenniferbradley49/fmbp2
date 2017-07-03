<?php

use Illuminate\Database\Seeder;
use App\Models\Format;

class formats_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 // commented out, as it is easier to do this through admin web interface, as any changes would reruire database re-seeding, and loss of data	
/*
    	DB::table('formats')->delete();
    	Format::create(array(
    		'str_text'     => 'Microsoft Word (.docx file)',
    		'str_form_code'     => 'format_ms'
    	));
    	 
    	Format::create(array(
    		'str_text'     => 'hand written',
    		'str_form_code'     => 'format_hw'
    	));
    	 
    	Format::create(array(
    		'str_text'     => 'type written',
    		'str_form_code'     => 'format_tw'
    	));
    	 
    	Format::create(array(
    		'str_text'     => 'Microsoft Wordpad, Works, or Notepad',
    		'str_form_code'     => 'format_ms'
    	));
    	 
    	Format::create(array(
    		'str_text'     => 'Apple Pages',
    		'str_form_code'     => 'format_ap'
    	));
    	   	 
    	Format::create(array(
    		'str_text'     => '.pdf file',
    		'str_form_code'     => 'format_pd'
    	));

    	Format::create(array(
    		'str_text'     => 'other word processor app',
    		'str_form_code'     => 'format_oa'
    	));   	 
 */  
    }
    
}
