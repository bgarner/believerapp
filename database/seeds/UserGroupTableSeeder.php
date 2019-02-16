<?php

use Illuminate\Database\Seeder;

class UserGroupTableSeeder extends Seeder
{
    private $groups =  [
    					 ['id' => 1, 'name' => 'admin'],
    					 ['id' => 2, 'name' => 'client'],
    					 ['id' => 3, 'name' => 'believer']
    					];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_groups')->truncate();
        
        foreach ($this->groups as $group) {
        	\DB::table('user_groups')->insert([
        		'id' => $group['id'],
        		'group' => $group['name']
        	]);
        }


    }
}
