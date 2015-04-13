<?php

class UserTableSeeder extends Seeder {
    
    public function run()
    {
        User::truncate();
        
        $admin = [
            'people_id' => '',
            'username'  => 'admin',
            'email'     => 'arkinthesky.69@gmail.com',
            'password'  => Hash::make('password'),
            'active'    => 'yes'
        ];
        
        User::create($admin);
    }
}
