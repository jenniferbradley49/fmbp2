<?php

use Illuminate\Database\Seeder;
use App\Models\Role_user;
use App\Models\Role;
use App\User;

class role_user_pivot_table_seeder extends Seeder
{
	var $role;
	var $user;
	
	public function __construct(
			Role $role,
			User $user)
	{
		$this->role = $role;
		$this->user = $user;
	}
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$obj_role = $this->role
		->where('name', 'admin')
		->first();
		 
		$obj_user = $this->user
		->where('email', 'bittids@gmail.com')
		->first();
		 
		DB::table('role_user')->delete();
		Role_user::create(array(
		'role_id'     => $obj_role->id,
		'user_id' => $obj_user->id
		));
	
	}
	

}
