<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
    	$this->call(users_table_seeder::class);
    	$this->call(roles_table_seeder::class);
    	$this->call(role_user_pivot_table_seeder::class);
    	$this->call(salutations_table_seeder::class);
    	$this->call(states_table_seeder::class);
    	$this->call(formats_table_seeder::class);
    	$this->call(Survey_projectsTableSeeder::class);
    	$this->call(survey_questions_table_seeder::class);
    	$this->call(survey_items_table_seeder::class);
    	 
    }
}
