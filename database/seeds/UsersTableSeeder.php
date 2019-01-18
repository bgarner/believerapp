<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('brands')->delete();
        DB::table('users')->truncate();
        $faker = Faker\Factory::create();
        
        for($i = 0; $i < 50; $i++) {
			User::create(
                array(
                    'name' => $faker->firstName . " " . $faker->lastName, 
                    'email' => $faker->email, 
                    'group_id' => $faker->numberBetween(1,3),
                    'email_verified_at' => now(),
                    'password' => md5('ketchup9')
                )
            );
		}
    }
}
