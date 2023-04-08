<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('ADMIN') ;

        $rh = User::create([
            'name' => 'rh',
            'email' => 'rh@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $rh->assignRole('RH') ;

        $chef = User::create([
            'name' => 'chef',
            'email' => 'chef@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $chef->assignRole('CE') ;

        $agent = User::create([
            'name' => 'agent',
            'email' => 'agent@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $agent->assignRole('AGENT') ;
        
    }
}
