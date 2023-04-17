<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\PermissionRoleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
<<<<<<< HEAD
            // UserSeeder::class,
            PermissionRoleSeeder::class,
            // PermissionSeeder::class,
            // RoleSeeder::class
=======
            // PermissionSeeder::class,
            PermissionRoleSeeder::class,
>>>>>>> fefb318bca059b979d9413dff4fda5e264e9d9e3
        ]);
    }
}
