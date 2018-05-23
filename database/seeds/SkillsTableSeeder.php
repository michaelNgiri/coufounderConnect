<?php

use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = [
            'Graphic Designer',
            'Business Analyst',
            'Web Developer',
            'IT Specialist',
            'Strategist',
            'Android Developer'
        ];
            
      

            foreach ($skills as $skill) {
            \App\Models\Skill::create(['name' => $skill]);
        }
    }
}
