<?php

namespace Database\Seeders\Basic;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    static $permissions = [
        [
            'id' => 1,
            'name' => 'write'
        ],
        [
            'id' => 2,
            'name' => 'edit'
        ],
        [
            'id' => 3,
            'name' => 'read'
        ]
    ];

    public function run()
    {
        foreach (self::$permissions as $permission) {
            Permission::create($permission);
        }
    }
}