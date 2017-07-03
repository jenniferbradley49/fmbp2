<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterClientsTableMuch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('clients', function($table){
    		$table->string('str_client_url');
    		$table->string('str_crm_url');
    		$table->string('str_telephone', 50);
    		
    	});
    		Schema::table('clients', function($table){
    			$table->dropColumn('str_telephone_one');
    			$table->dropColumn('str_crm_website');
    			 
    		});
    			 
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('clients', function($table){
    		$table->dropColumn('str_client_url');
    		$table->dropColumn('str_crm_url');
    		$table->dropColumn('str_telephone');
    		
    	});

    	Schema::table('clients', function($table){
    		$table->string('str_crm_website');
    		$table->string('str_telephone_one');    		
    	});
    			 
        //
    }
}
