<?php

use Illuminate\Database\Seeder;
use App\Models\Redemption;

class RedemptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('redemptions')->truncate();
        $faker = Faker\Factory::create();
        
        for($i = 0; $i < 100; $i++) {
            Redemption::create(
                array(
                    'advocate_profile_id' => $faker->numberBetween(1,2487),
                    'reward_id' => $faker->numberBetween(1,500)
                )
            );
		}
    }
}
