<?php

use Illuminate\Database\Seeder;

class UserGroupTableSeeder extends Seeder
{
    private $groups =  [
    					 ['id' => 1, 'name' => 'superadmin'],
    					 ['id' => 2, 'name' => 'brandadmin'],
    					 ['id' => 3, 'name' => 'advocate']
    					];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->groups as $group) {
        	\DB::table('user_groups')->insert([
        		'id' => $group['id'],
        		'group' => $group['name']
        	]);
        }


    }
}
