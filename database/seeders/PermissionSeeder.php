<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['name'=>'chat'],
            ['name'=>'G-utilisateurs'],
            ['name'=>'G-groupes'],
            ['name'=>'G-conversations'],
            ['name'=>'G-formulaires'],
            ['name'=>'remplissage-fromulaire'],
            ['name'=>'G-présence'],
            ["name"=>"G-entretiens"],
            ["name"=>"G-formations"],
            ["name"=>"calcule"],
            ["name"=>"statistique-agent"],
            ["name"=>"G-codes"],
            ["name"=>"Tableau-agents"],
            ["name"=>"Tableau-RDV"],
            ["name"=>"G-notifications"],
            ["name"=>"G-calendrier"],
        ];

        for ($i=0; $i < count($permissions); $i++) { 
            Permission::create($permissions[$i]);
        };
    }
}
