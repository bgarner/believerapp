<?php

use Illuminate\Database\Seeder;
use App\Models\RewardType;

class RewardsTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rewards_types')->truncate();
        $faker = Faker\Factory::create();
        
        for($i = 0; $i < 5; $i++) {
			RewardType::create(
                array(
                    'type' => $faker->word 
                )
            );
		}
    }
}
