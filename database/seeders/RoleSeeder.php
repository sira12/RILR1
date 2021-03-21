<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1=Role::create(['name'=>'Admin']);
        $role2=Role::create(['name'=>'Cliente']);

        $permission = Permission::create(['name' => 'Ver']);
        $permission2 = Permission::create(['name' => 'Listar']);

        $role1->givePermissionTo($permission);
        $role2->givePermissionTo($permission2);
        
    }
}
