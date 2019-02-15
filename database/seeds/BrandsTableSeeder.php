<?php

use Illuminate\Database\Seeder;
use App\Models\Client;

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
            $company = $faker->company;
			Client::create(
                array(
                    'name' => $company, 
                    'unique_name' => preg_replace("/[^a-zA-Z]+/", "", $company),
                    'description' => $faker->sentence, 
                    'logo' => 'fake_logo.jpg',
                    'address1' => $faker->streetAddress,
                    'address2' => '',
                    'city' => $faker->city,
                    'province' => $faker->stateAbbr,
                    'postal_code' => $faker->postcode,
                    'phone1' => $faker->phoneNumber,
                    'phone2' => $faker->phoneNumber
                )
            );
		}
    }
}
