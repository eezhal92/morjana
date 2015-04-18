<?php

class CityTableSeeder extends Seeder {
    
    public function run() 
    {
        City::truncate();
        
        $gorontalo = [];
        
        $sulsel = ['Makassar', 'Gowa'];
        
        $sultenggara = [];
        
        $sulteng = [
            'Banggai', 'Banggai Kepulauan', 'Banggai Laut', 'Buol', 'Donggala',
            'Morowali', 'Morowali Utara', 'Parigi Moutong', 'Poso', 'Sigi',
            'Tojo Una-Una', 'Toli-Toli', 'Palu'
        ];
        
        $sulut = ['Manado', 'Tomohon'];
        
        $sulbar = [];
        
        /* Sulawesi Tengah */
        
        $sulsel_id = Province::where('name', 'Sulawesi Selatan')->get()->first()->id;
        
        foreach($sulsel as $s) {
            City::create([
                'province_id' => $sulsel_id, 
                'name' => $s
            ]);    
        }
        
        $sulteng_id = Province::where('name', 'Sulawesi Tengah')->get()->first()->id;
        
        foreach($sulteng as $s) {
            City::create([
                'province_id' => $sulteng_id, 
                'name' => $s
            ]);    
        }
        
        $sulut_id = Province::where('name', 'Sulawesi Utara')->get()->first()->id;
        
        foreach($sulut as $s) {
            City::create([
                'province_id' => $sulut_id, 
                'name' => $s
            ]);    
        }
        
    }
    
}