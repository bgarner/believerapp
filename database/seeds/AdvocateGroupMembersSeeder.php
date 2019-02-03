<?php

use Illuminate\Database\Seeder;
use App\Models\AdvocateGroupMember;

class AdvocateGroupMembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advocate_group_members')->truncate();
        $faker = Faker\Factory::create();
        
        for($i = 0; $i < 600; $i++) {
			AdvocateGroupMember::create(
                array(
                    'user_id' => $faker->numberBetween(1,500),
                    'group_id' => $faker->numberBetween(1,20)
                )
            );
		}
    }
}
