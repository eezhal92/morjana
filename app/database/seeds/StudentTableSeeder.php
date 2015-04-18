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
                'date_of_birth' => '1980-05-11',
                'village_id'     => 2
            ], 
            [
                'first_name'    => 'Jane',
                'last_name'     => 'Doe',
                'gender'        => 'female',                
                'address'       => 'Google HQ st.',
                'date_of_birth' => '1980-07-26',
                'village_id'    => 2
            ],
            [
                'first_name'    => 'Hello',
                'last_name'     => 'World',
                'gender'        => 'male',
                'address'       => 'Apple Spaceship st.',
                'date_of_birth' => '1970-01-20',
                'village_id'    => 1
            ],
            [
                'first_name'    => 'Foo',
                'last_name'     => 'Bar',
                'gender'        => 'female',
                'address'       => 'Apple Spaceship st.',
                'date_of_birth' => '1970-01-28',
                'village_id'    => 1
            ],
        ];
        
        foreach($people as $p) {
            $person = People::create($p);
        }
        
        $people = [
            [
                'first_name'    => 'Billy',
                'last_name'     => 'Doe',
                'gender'        => 'female',                
                'address'       => 'Google HQ st.',
                'date_of_birth' => '1992-05-08',
                'village_id'    => 2
            ],
            [
                'first_name'    => 'Fritz',
                'last_name'     => 'World',
                'gender'        => 'male',
                'address'       => 'Apple Spaceship st.',
                'date_of_birth' => '1992-01-31',
                'village_id'    => 1
            ]
        ];
        
        foreach($people as $p) {
            $person = People::create($p);
            
            $student = new Student([
                'student_number' => rand(1000, 2000),
                'univercity_id' => rand(1, 5),
                'major_id' => rand(1, 6),
                'degree_id' => rand(1, 4),
                'year' => rand(2008, 2015),
                'type' => 'regular',
                'amount_of_grant' => rand(3000000, 5000000),
                'father_id' => 1, 
                'mother_id' => 2
            ]);
            
            $student = $person->student()->save($student);        
        }
    
    }

}