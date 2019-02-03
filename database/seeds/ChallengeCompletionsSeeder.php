<?php

use Illuminate\Database\Seeder;
use App\Models\ChallengeCompletion;

class ChallengeCompletionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('challenge_audiences')->truncate();
        $faker = Faker\Factory::create();
        
        for($i = 0; $i < 600; $i++) {
			ChallengeCompletion::create(
                array(
                    'challenge_id' => $faker->numberBetween(1,500),
                    'user_id' => $faker->numberBetween(1,500)
                )
            );
		}
    }
}
