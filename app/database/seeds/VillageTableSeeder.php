<?php

class VillageTableSeeder extends Seeder {
    
    public function run() 
    {
        
        Village::truncate();
        
        $bungku_barat = [
            'Ambunu', 'Atananga', 'Bahoea Reko-Reko', 'Bahonsuai', 'Beringin Jaya', 'Bumi Harapan',
            'Emea', 'Karaupa', 'Lambelu', 'Lantula Jaya', 'Larobenu'
        ];
        
        $bungku_barat_id = SubDistrict::where('name', 'Bungku Barat')->get()->first()->id;
        
        foreach($bungku_barat as $bb) {
            Village::create([
                'sub_district_id' => $bungku_barat_id,
                'name'            => $bb
            ]);
        }
    }
    
}