<?php

use Illuminate\Database\Seeder;
use App\Models\AdvocateProfile;
use App\Models\AdvocateBulkUpload;

class AdvocateProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advocate_profiles')->truncate();
        $faker = Faker\Factory::create();
        $registered_users = AdvocateBulkUpload::where('registered', 1)->get();
        
        foreach($registered_users as $advocate){
            AdvocateProfile::create(
                array(
                    'first' => $advocate->first,
                    'last' => $advocate->last,
                    'advocate_bulk_upload_id' => $advocate->id,
                    'email' => $advocate->email,
                    'social_accounts' => '{"twitter": {"handle": "@'.$advocate->first . $advocate->last.'","twitter_api_key": "'.$faker->sha1.'"},"facebook":{"username": "'.$advocate->first . $advocate->last.'","facebook_api_key": "'.$faker->sha1.'"}}',
                    'points' => $faker->numberBetween(0,1000)
                )
            );
        }
        
    }
}
