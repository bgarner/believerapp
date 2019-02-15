<?php

use Illuminate\Database\Seeder;
use App\Models\ChallengeType;

class ChallengeTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('challenge_types')->truncate();
        $faker = Faker\Factory::create();
        
        for($i = 0; $i < 10; $i++) {
			ChallengeType::create(
                array(
                    'type' => $faker->word 
                )
            );
		}
    }
}
