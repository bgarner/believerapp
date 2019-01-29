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
			Brand::create(array(
                'name' => $faker->company, 
                'description' => $faker->sentence, 
                'logo' => 'fake_logo.jpg', 
                'address1' => $faker->streetAddress,
                'address2' => '',
                'city' => $faker->city,
                'province' => $faker->stateAbbr,
                'postal_code' => $faker->postcode,
                'lat' => $faker->latitude($min = 49, $max = 53),
                'lng' => $faker->longitude($min = -112.062019, $max = -116.062019)
            ));
		}
    }
}
