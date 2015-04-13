<?php

class CityTableSeeder extends Seeder {
    
    public function run() 
    {
        
        $gorontalo = [];
        
        $sulsel = [];
        
        $sultenggara = [];
        
        $sulteng = [
            'Banggai', 'Banggai Kepulauan', 'Banggai Laut', 'Buol', 'Donggala',
            'Morowali', 'Morowali Utara', 'Parigi Moutong', 'Poso', 'Sigi',
            'Tojo Una-Una', 'Toli-Toli', 'Palu'
        ];
        
        $sulut = [];
        
        $sulbar = [];
        
        /* Sulawesi Tengah */
        
        $sulteng_id = Province::where('name', 'Sulawesi Tengah')->get()->first()->id;
        
        foreach($sulteng as $s) {
            City::create([
                'province_id' => $sulteng_id, 
                'name' => $s
            ]);    
        }
        
    }
    
}