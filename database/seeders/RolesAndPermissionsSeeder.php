<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $models = ["year", "building", "class", "course", "faculty", "room", "schedule", "study"];
        $permissions = ["create", "read", "update", "delete"];
        $roles = ["superadmin", "admin"];

        $permissionsData = [];

        foreach ($models as $model) {
            foreach ($permissions as $permission) {
                array_push($permissionsData, ["name" => "$permission-$model", "guard_name" => "admin"]);
            }
        }

        Permission::insert($permissionsData);

        $roleSuperAdmin = Role::create(["name" => "superadmin"]);
        $roleAdmin = Role::create(["name" => "admin"]);

        $user = User::firstWhere("email", "superadmin@gmail.com");
        $user->assignRole($roleSuperAdmin);
    }
}
