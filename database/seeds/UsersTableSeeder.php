<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        App\User::create([
            'id'    => '1',
            'name'  => 'Cthulhu',
            'email' => 'cthulhu@gmail.com',
            'password' => Hash::make('123'),
        ]);

        App\User::create([
            'id'    => '2',
            'name'  => 'Dean Winchester',
            'email' => 'dean_topster@gmail.com',
            'password' => Hash::make('123'),
        ]);

        App\User::create([
            'id'    => '3',
            'name'  => 'Ozzy Osbourne',
            'email' => 'ozzy@gmail.com',
            'password' => Hash::make('123'),
        ]);
    }
}
