<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterClientsTableAddClientUrl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
   // replaced by alter much may 11, so commented out 	
 /*   	Schema::table('clients', function($table){
    		$table->string('str_client_url', 50)->after('id');
    	});
 */   		 
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
/*    	Schema::table('clients', function($table){
    		$table->dropColumn('str_client_url');
    	});
*/    		 
        //
    }
}
