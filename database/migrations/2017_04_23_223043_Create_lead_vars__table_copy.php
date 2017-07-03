<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadVarsTableCopy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	
    	Schema::create(
    	'lead_vars',
    	function (Blueprint $table)
    	{
    		$table->increments('id');
    		$table->integer('client_id')->unsigned();   			
    		$table->integer('lead_info_id')->unsigned();    			
    		$table->string('str_lead_var');
    		$table->timestamps();
    	}
    	);
    	 
    	
    	Schema::table(
    	'lead_vars',
    	function (Blueprint $table)
    	{
    		$table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
    		$table->foreign('lead_info_id')->references('id')->on('lead_info')->onDelete('cascade');
    	}
    	);
    	
    	
    	Schema::table(
    	'lead_vars',
    	function (Blueprint $table)
    	{
    		$table->index('client_id');
    		$table->index('lead_info_id');
    	}
    	);
    	
    	 
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    	Schema::table(
    	'lead_vars',
    	function (Blueprint $table)
    	{
    		$table->dropForeign('lead_vars_client_id_foreign');
    		$table->dropForeign('lead_vars_lead_info_id_foreign');
    		$table->dropIndex('lead_vars_client_id_index');
    		$table->dropIndex('lead_vars_lead_info_id_index');
    	}
    	);
    	
    	Schema::drop('lead_vars');
    	 
        //
    }
}
