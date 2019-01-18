<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        // Disable Foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // $this->call(UsersTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(AdvocateBulkUploadsSeeder::class);
        $this->call(UserGroupTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ChallengeTypesSeeder::class);
        $this->call(RewardsTypesTableSeeder::class);
        $this->call(AdvocateGroupsSeeder::class);
        $this->call(AdvocateProfilesSeeder::class);
    }
}
