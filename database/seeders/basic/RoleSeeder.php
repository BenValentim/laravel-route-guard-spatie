<?php

namespace Database\Seeders\Basic;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    static $roles = [
        [
            'id' => 1,
            'name' => 'admin'
        ]
    ];

    public function run()
    {
        $permissions = Permission::get();

        foreach (self::$roles as $role) {
            $objectRole = Role::create($role);
            $objectRole->syncPermissions($permissions);
        }
    }
}
