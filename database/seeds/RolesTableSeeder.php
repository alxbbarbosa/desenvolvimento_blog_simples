<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role        = Role::create(['name' => 'Administrador']);
        $permissions = Permission::select('id')->get()->toArray();
        $role->syncPermissions($permissions);

        $role        = Role::create(['name' => 'Editor chefe']);
        $permissions = Permission::select('id')
                ->orWhere('name', 'like', "category%")
                ->orWhere('name', 'like', "article%")
                ->orWhere('name', 'like', "comment%")
                ->get()->toArray();
        $role->syncPermissions($permissions);

        $role        = Role::create(['name' => 'Editor']);
        $permissions = Permission::select('id')
                ->where('name', 'like', "article%")
                ->orWhere('name', 'like', "comment%")
                ->get()->toArray();
        $role->syncPermissions($permissions);

        $role        = Role::create(['name' => 'Moderador']);
        $permissions = Permission::select('id')
                ->where('name', 'like', "comment%")
                ->get()->toArray();
        $role->syncPermissions($permissions);
    }
}