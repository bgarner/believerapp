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
        
        for($i = 0; $i < 500; $i++) {
            $first = $faker->firstName;
            $last = $faker->lastName;
			User::create(
                array(
                    'name' => $first . " " . $last, 
                    'first' => $first,
                    'last' => $last,
                    'email' => $first . "." . $last . "@gmail.com", 
                    'group_id' => $faker->numberBetween(1,3),
                    'email_verified_at' => now(),
                    'password' => md5('ketchup9'),
                    'point_balance' => $faker->numberBetween(0,2500),
                    'social_accounts' => '',
                    'level' => $faker->numberBetween(1,9),
                    'address1' => $faker->streetAddress,
                    'address2' => '',
                    'city' => $faker->city,
                    'province' => $faker->stateAbbr,
                    'postal_code' => $faker->postcode,
                    'phone1' => $faker->phoneNumber,
                    'phone2' => $faker->phoneNumber
                )
            );
		}
    }
}
