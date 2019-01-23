<?php

use Illuminate\Database\Seeder;
use App\Models\AdvocateLevel;

class AdvocateLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $level_range = ["0","50","100","150","200","250","300","500","700"];
    private $multiplier = ["0.1","0.3","0.5","0.7","1","1.2","1.5","1.8","2"];


    public function run()
    {
        DB::table('advocate_levels')->truncate();
        
        for($i = 0; $i < 9; $i++) {
			AdvocateLevel::create(
                array(
                    'level' => $i+1,
                    'level_range' => $this->level_range[$i],
                    'multiplier' => $this->multiplier[$i]
                )
            );
		}
    }
}
