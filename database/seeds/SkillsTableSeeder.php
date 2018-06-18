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
            'A Graphic Designer',
            'A Business Analyst',
            'A Web Developer',
            'An IT Specialist',
            'A Strategist',
            'An Android Developer'
        ];
            
      

            foreach ($skills as $skill) {
            \App\Models\Skill::create(['name' => $skill]);
        }
    }
}
