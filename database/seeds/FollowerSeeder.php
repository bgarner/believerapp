<?php

use Illuminate\Database\Seeder;
use App\Models\Follower;

class FollowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('followers')->truncate();
        $faker = Faker\Factory::create();
        
        for($i = 0; $i < 500; $i++) {
			Follower::create(
                array(
                    'brand_id' => $faker->numberBetween(1,50),
                    'advocate_profile_id' => $faker->numberBetween(1,50)
                )
            );
		}
    }
}
