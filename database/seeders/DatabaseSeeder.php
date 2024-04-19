<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(Basic\RoleSeeder::class);
        $this->call(Basic\PermissionSeeder::class);

        User::factory(4)->create();


        $users = User::get();
        $role = Role::get();
        $permissions = Permission::get();

        for ($i = 0; $i < sizeof($users); $i++) {
            switch ($i) {
                case 0:
                    $users[$i]->assignRole($role[0]);
                    break;

                case 1:
                    $users[$i]->givePermissionTo($permissions[0]);
                    break;

                case 2:
                    $users[$i]->givePermissionTo($permissions[1]);
                    break;

                case 3:
                    $users[$i]->givePermissionTo($permissions[2]);
                    break;

                default:
                    break;
            }
        }
    }
}
