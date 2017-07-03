<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class roles_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('roles')->delete();
    	Role::create(array(
    	'name'     => 'registree',
//    	'cloaked_id' => \Hash::make('tpo'.(string)time())
    	));
    	
    	Role::create(array(
    	'name'     => 'agent',
//    	'cloaked_id' => \Hash::make('adm'.(string)time())
    	));

    	Role::create(array(
    	'name'     => 'admin',
    	//    	'cloaked_id' => \Hash::make('adm'.(string)time())
    	));
    	 
    	
    }
}
