<?php

use Illuminate\Database\Seeder;
use App\Models\Reward;

class RewardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rewards')->truncate();
        $faker = Faker\Factory::create();

        for($i = 0; $i < 500; $i++) {
            Reward::create(
                array(
                    'reward_type_id' => $faker->numberBetween(1,5),
                    'title' => $faker->sentence(5),
                    'description' => $faker->sentence(10),
                    'image' => 'v1556157584/q1qfk5wybhu5ssvv7sbw.jpg',
                    'points' => $faker->randomElement($array = array (100,200,300,400,500)),
                    'active_status' => 1
                )
            );
		}
    }
}
