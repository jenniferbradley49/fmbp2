<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterClientsTableAddDelivery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('clients', function($table){
    		$table->boolean('bool_delivery_crm');
    		$table->string('str_email_delivery');
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
    		$table->dropColumn('bool_delivery_crm');
    		$table->dropColumn('str_email_delivery');    	
    	});   		 
        //
    }
}
