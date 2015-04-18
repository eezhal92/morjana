<?php

class DegreeTableSeeder extends Seeder {
    
    /**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        Degree::truncate();
        
        $degrees = ['Vocational', 'Bachelor', 'Master', 'Doctoral'];
        
        foreach($degrees as $degree)
        {
            Degree::create(['name' => $degree]);
        }
    }
}