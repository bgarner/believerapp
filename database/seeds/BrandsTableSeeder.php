<?php

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('brands')->delete();
        DB::table('brands')->truncate();
        $faker = Faker\Factory::create();
        
        for($i = 0; $i < 50; $i++) {
			Brand::create(array('name' => $faker->company, 'description' => $faker->sentence, 'logo' => 'fake_logo.jpg' ));
		}
    }
}
