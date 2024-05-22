<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'secre']);
        $role2 = Role::create(['name'=>'doctor']);

        Permission::create(['name'=>'pages-home'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'pacientes.index'])->syncRoles([$role1]);
        Permission::create(['name'=>'pacientes.create'])->syncRoles([$role1]);
        Permission::create(['name'=>'pacientes.edit'])->syncRoles([$role1]);

        

    }
    
}
