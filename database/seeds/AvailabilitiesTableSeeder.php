<?php

use Illuminate\Database\Seeder;
use App\Models\Availability;

class AvailabilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $availabilities = array("-10hrs","20hrs","30hrs","40hrs","50hrs+", "other");

        foreach ($availabilities as $availability){
            Availability::create(['name'=>$availability]);
        }
    }
}
