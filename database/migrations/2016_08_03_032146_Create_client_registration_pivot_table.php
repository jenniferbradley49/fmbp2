<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientRegistrationPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create(
    	'client_registration',
    	function (Blueprint $table) {
    		$table->integer('client_id')->unsigned();
    		//    		$table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
    		$table->integer('registration_id')->unsigned();
    		//    		$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
    		$table->timestamps();
    		$table->engine = 'InnoDB';
    	}
    	);
    	Schema::table(
    	'client_registration',
    	function (Blueprint $table) {
    		$table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
    		$table->foreign('registration_id')->references('id')->on('registrations')->onDelete('cascade');
    		//    		$table->foreign('user_id')->references('id')->on('user');
    		//    		$table->foreign('role_id')->references('id')->on('roles');
    	}
    	);
    	Schema::table(
    	'client_registration',
    	function (Blueprint $table)
    	{
    		$table->index('client_id');
    		$table->index('registration_id');
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
    	'client_registration',
    	function (Blueprint $table)
    	{
    		$table->dropForeign('client_registration_client_id_foreign');
    		$table->dropForeign('client_registration_registration_id_foreign');
    		$table->dropIndex('client_registration_client_id_index');
    		$table->dropIndex('client_registration_registration_id_index');
    	}
    	);
    	 
    	Schema::drop('client_registration');
    	
        //
    }
}
