<?php

class StudentTableSeeder extends Seeder {

    public function run()
    {
        
        People::truncate();

        $people = [
            [
                'first_name'    => 'John',
                'last_name'     => 'Doe',
                'gender'        => 'male',
                'address'       => 'Wallstreet st.',
                'date_of_birth' => '1992-05-11',
                'village_id'     => 2
            ], 
            [
                'first_name'    => 'Foo',
                'last_name'     => 'Bar',
                'gender'        => 'male',                
                'address'       => 'Google HQ st.',
                'date_of_birth' => '1992-07-20',
                'village_id'    => 2
            ],
            [
                'first_name'    => 'Hello',
                'last_name'     => 'World',
                'gender'        => 'female',
                'address'       => 'Apple Spaceship st.',
                'date_of_birth' => '1990-01-20',
                'village_id'    => 1
            ],
        ];
        
        foreach($people as $p) {
            $person = People::create($p);
            
            $student = new Student([
                'student_number' => rand(100, 200),
                'father_id' => 2, 
                'mother_id' => 3
            ]);
            
            $student = $person->student()->save($student);        
        }
    
    }

}