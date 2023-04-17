<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::find(1);
        $admin->givePermissionTo('chat','G-utilisateurs','G-groupes','G-conversations','G-formulaires','remplissage-fromulaire');
        $rh = Role::find(2);
        $rh->givePermissionTo('chat','G-présence','G-entretiens','G-formations','Calcule-salaire','Calcule-assiduité','Calcule-prime','statistique-agent','G-notifications');
        $ce = Role::find(3);
        $ce->givePermissionTo('chat','G-codes','Tableau-agents','Tableau-RDV');
        $agent = Role::find(4);
        $agent->givePermissionTo('chat','remplissage-fromulaire');
    }
}
