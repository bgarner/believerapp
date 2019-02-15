<?php

use Illuminate\Database\Seeder;
use App\Models\AdvocateBulkUpload;

class AdvocateBulkUploadsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('brands')->delete();
        DB::table('advocate_bulk_uploads')->truncate();
        $faker = Faker\Factory::create();
        
        for($i = 0; $i < 5000; $i++) {
            AdvocateBulkUpload::create(
                array(
                    'first' => $faker->firstName, 
                    'last' => $faker->lastName, 
                    'email' => $faker->email, 
                    'registered' => $faker->numberBetween(0, 1),
                    'level' => 1,
                    'group_segmentation' => 1,
                    'user_id_uploader' => $faker->numberBetween(1, 50)
                )
            );
		}
    }
}
