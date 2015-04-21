<?php

class StudentTableSeeder extends Seeder {

    public function run()
    {
        
        People::truncate();
        Student::truncate();

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
                'first_name'    => 'Ahmad',
                'last_name'     => 'As-Sodiq',
                'gender'        => 'male',
                'address'       => 'Kuffah',
                'date_of_birth' => '1970-01-20',
                'village_id'    => 1
            ],
            [
                'first_name'    => 'Aisyah',
                'last_name'     => 'Al-Mu\'minah',
                'gender'        => 'female',
                'address'       => 'Basroh',
                'date_of_birth' => '1970-01-28',
                'village_id'    => 1
            ],
            [
                'first_name'    => 'Dave',
                'last_name'     => 'Steve',
                'gender'        => 'male',
                'address'       => 'Birobuli Utara',
                'date_of_birth' => '1970-01-20',
                'village_id'    => 1
            ],
            [
                'first_name'    => 'Tika',
                'last_name'     => 'Watson',
                'gender'        => 'female',
                'address'       => 'Birobuli Utara',
                'date_of_birth' => '1970-01-28',
                'village_id'    => 1
            ],
            [
                'first_name'    => 'Andi',
                'last_name'     => 'Wicaksana',
                'gender'        => 'male',
                'address'       => 'Lolu Utara',
                'date_of_birth' => '1970-01-20',
                'village_id'    => 1
            ],
            [
                'first_name'    => 'Sinta',
                'last_name'     => 'Dewi',
                'gender'        => 'female',
                'address'       => 'Lalo Utara',
                'date_of_birth' => '1970-01-28',
                'village_id'    => 1
            ],
        ];
        
        $fathers = [];
        $mothers = [];
        
        foreach($people as $p) {
            $person = People::create($p);
            
            if($person->gender == 'male') {
                array_push($fathers, $person->id);
            } else {
                array_push($mothers, $person->id);
            }
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
            ],
            [
                'first_name'    => 'Adi',
                'last_name'     => 'Wiguna',
                'gender'        => 'male',
                'address'       => 'Apple Spaceship st.',
                'date_of_birth' => '1992-01-31',
                'village_id'    => 1
            ],
            [
                'first_name'    => 'Indra',
                'last_name'     => 'Winadi',
                'gender'        => 'male',
                'address'       => 'Apple Spaceship st.',
                'date_of_birth' => '1992-01-31',
                'village_id'    => 1
            ],
            [
                'first_name'    => 'Dinda',
                'last_name'     => 'Nabilla',
                'gender'        => 'female',
                'address'       => 'Banteng 20',
                'date_of_birth' => '1992-04-20',
                'village_id'    => 1
            ],
            [
                'first_name'    => 'Cynthia',
                'last_name'     => 'Indriani',
                'gender'        => 'female',
                'address'       => 'Zebra 20',
                'date_of_birth' => '1992-04-06',
                'village_id'    => 2
            ],
            [
                'first_name'    => 'Ibnu',
                'last_name'     => 'Qudama',
                'gender'        => 'male',
                'address'       => 'Basroh 20',
                'date_of_birth' => '1992-09-11',
                'village_id'    => 1
            ],
            [
                'first_name'    => 'Rifqi',
                'last_name'     => 'Utama',
                'gender'        => 'male',
                'address'       => 'Nitikan 20',
                'date_of_birth' => '1991-01-23',
                'village_id'    => 2
            ],
            [
                'first_name'    => 'Ayu',
                'last_name'     => 'Utami',
                'gender'        => 'female',
                'address'       => 'Nitikan 20',
                'date_of_birth' => '1993-07-02',
                'village_id'    => 2
            ],
            
            [
                'first_name'    => 'Doni',
                'last_name'     => 'Baron',
                'gender'        => 'male',
                'address'       => 'Gebang Wetan 20',
                'date_of_birth' => '1993-07-02',
                'village_id'    => 3
            ],
        ];
        
        foreach($people as $p) {
            $person = People::create($p);
            
            $fkey = array_rand($fathers);
            $mkey = array_rand($mothers);
            
            $student = new Student([
                'student_number' => rand(1000, 2000),
                'univercity_id' => rand(1, 5),
                'major_id' => rand(1, 6),
                'degree_id' => rand(1, 4),
                'year' => rand(2008, 2015),
                'type' => 'regular',
                'amount_of_grant' => rand(3000000, 5000000),
                'father_id' => $fathers[$fkey], 
                'mother_id' => $mothers[$mkey]
            ]);
            
            $student = $person->student()->save($student);        
        }
    
    }

}