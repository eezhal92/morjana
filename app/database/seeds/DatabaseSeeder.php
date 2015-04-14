<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->call('ProvinceTableSeeder');
        $this->call('CityTableSeeder');
        $this->call('SubDistrictTableSeeder');
        $this->call('VillageTableSeeder');
        
        $this->call('UserTableSeeder');
        $this->call('StudentTableSeeder');
	}

}
