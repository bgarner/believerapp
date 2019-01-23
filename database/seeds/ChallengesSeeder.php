<?php

use Illuminate\Database\Seeder;
use App\Models\Challenge;

class ChallengesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('challenges')->truncate();
        $faker = Faker\Factory::create();
        
        for($i = 0; $i < 500; $i++) {
            Challenge::create(
                array(
                    'name' => $faker->sentence(3),
                    'content' => $faker->sentence(10),
                    'start' => $faker->dateTimeBetween('-2 weeks', 'now'), 
                    'end' => $faker->dateTimeBetween('+1 month', '+1 years'),
                    'brand_id' => $faker->numberBetween(1, 50),
                    'created_by' => $faker->numberBetween(1, 50),
                    'is_draft' => 0,
                    'points' => 0,
                    'challenge_type' => $faker->numberBetween(1, 10)
                )
            );
		}
    }
}
