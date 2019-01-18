<?php

use Illuminate\Database\Seeder;

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
			User::create(
                array(
                    'type' => $faker->word 
                )
            );
		}
    }
}
