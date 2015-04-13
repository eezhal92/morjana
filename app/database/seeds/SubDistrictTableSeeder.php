<?php

class SubDistrictTableSeeder extends Seeder {
    
    public function run() 
    {
        
        SubDistrict::truncate();
        
        $morowali = [
            'Bahodopi', 'Bumi Raya', 'Bungku Barat', 'Bungku Pesisir', 
            'Bungku Selatan', 'Bungku Tengah', 'Bungku Timur', 'Bungku Utara',
            'Lembo Raya', 'Lembo', 'Mamosalato', 'Menui Kepulauan', 'Mori Atas',
            'Petasia Timur', 'Petasia', 'Soyo Jaya', 'Wita Ponda'            
        ];
        
        $morowali_id = City::where('name', 'Morowali')->get()->first()->id;
        
        foreach($morowali as $m) {
            SubDistrict::create([
                'city_id' => $morowali_id,
                'name'    => $m
            ]);
        }
        
    }
    
}