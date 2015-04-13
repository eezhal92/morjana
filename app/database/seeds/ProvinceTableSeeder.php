<?php

class ProvinceTableSeeder extends Seeder {
    
    public function run() 
    {
        
        $provinces = [
            'Gorontalo', 'Sulawesi Barat', 'Sulawesi Selatan', 'Sulawesi Tengah', 
            'Sulawesi Tenggara', 'Sulawesi Utara' 
        ];
        
        foreach($provinces as $p) {
            Province::create(['name' => $p]);
        }

    }
    
}