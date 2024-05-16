<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'Secretaria']);
        $role2 = Role::create(['name'=>'Doctor']);
        $role3 = Role::create(['name'=>'Paciente']);
        $role4 = Role::create(['name'=>'Admin']);

        Permission::create(['name'=>'page-home'])->syncRoles($role1,$role2,$role3,$role4);
        
        Permission::create(['name'=>'page.tags-home'])->syncRoles($role1,$role4);
        Permission::create(['name'=>'pacientes.tags'])->syncRoles($role1,$role4);

        Permission::create(['name'=>'page.posts-home'])->syncRoles($role1,$role4);
        Permission::create(['name'=>'pacientes.posts'])->syncRoles($role1,$role4);

        

    }   
}
