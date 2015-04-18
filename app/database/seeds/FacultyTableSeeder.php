<?php

class FacultyTableSeeder extends Seeder
{
    
    public function run()
    {
        Faculty::truncate();
        
        $faculties = ['Engineering', 'Medical', 'Communication'];
        
        foreach($faculties as $faculty)
        {
            Faculty::create(['name' => $faculty]);
        }
    }
}