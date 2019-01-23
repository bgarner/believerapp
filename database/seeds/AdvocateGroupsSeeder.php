<?php

use Illuminate\Database\Seeder;
use App\Models\AdvocateGroup;

class AdvocateGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advocate_groups')->truncate();
        $faker = Faker\Factory::create();
        
        for($i = 0; $i < 20; $i++) {
			AdvocateGroup::create(
                array(
                    'name' => $faker->word
                )
            );
		}
    }
}
