<?php

use Illuminate\Database\Seeder;

class ProgressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $progresses = [
            'conception',
            'incubation',
            'in_development',
            'testing',
            'completed'
        ];



        foreach ($progresses as $progress) {
            \App\Models\Progress::create(['name' => $progress]);
        }
    }
}
