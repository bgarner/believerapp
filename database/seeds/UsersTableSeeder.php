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
            $first = $faker->firstName;
            $last = $faker->lastName;
			User::create(
                array(
                    'name' => $first . " " . $last, 
                    'email' => $first . "." . $last . "@gmail.com", 
                    'group_id' => $faker->numberBetween(1,2),
                    'email_verified_at' => now(),
                    'password' => md5('ketchup9')
                )
            );
		}
    }
}
