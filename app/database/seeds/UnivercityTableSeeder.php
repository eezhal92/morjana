<?php

class UnivercityTableSeeder extends Seeder
{
    
    public function run()
    {
        Univercity::truncate();
        
        $palu_id = City::where('name', 'Palu')->get()->first()->id;
        $makassar_id = City::where('name', 'Makassar')->get()->first()->id;
        $manado_id = City::where('name', 'Manado')->get()->first()->id;
        
        $univercities = [
            [
                'city_id' => $palu_id,
                'name' => 'Universitas Tadulako',
                'type' => 'public'
            ],
            [
                'city_id' => $palu_id,
                'name' => 'STMIK Adhiguna',
                'type' => 'private'
            ],
            [
                'city_id' => $palu_id,
                'name' => 'STIE Pancabhakti',
                'type' => 'private'
            ],
            [
                'city_id' => $makassar_id,
                'name' => 'Universitas Hasanuddin',
                'type' => 'public'
            ],
            [
                'city_id' => $manado_id,
                'name' => 'Universitas Sam Ratulangi',
                'type' => 'public'
            ]
            
        ];
        
        foreach($univercities as $univercity)
        {
            Univercity::create($univercity);
        }
    }
}