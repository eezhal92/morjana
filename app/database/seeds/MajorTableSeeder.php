<?php

class MajorTableSeeder extends Seeder
{
    
    public function run()
    {
        Major::truncate();
        
        $engineering_id = Faculty::where('name', 'Engineering')->get()->first()->id;
        $medical_id = Faculty::where('name', 'Medical')->get()->first()->id;
        $communication_id = Faculty::where('name', 'Communication')->get()->first()->id;
        
        $majors = [
            [
                'faculty_id' => $engineering_id,
                'name' => 'Architecture'
            ],
            [
                'faculty_id' => $engineering_id,
                'name' => 'Computer Science'
            ],
            [
                'faculty_id' => $engineering_id,
                'name' => 'Civil'
            ],
            [
                'faculty_id' => $medical_id,
                'name' => 'Dental'
            ],
            [
                'faculty_id' => $medical_id,
                'name' => 'Neurotic'
            ],
            [
                'faculty_id' => $communication_id,
                'name' => 'Visual Design Communication'
            ],
        ];
        
        foreach($majors as $major)
        {
            Major::create($major);
        }
    
    }
}