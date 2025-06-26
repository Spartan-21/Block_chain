<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConnectRelationshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Get Available Permissions.
         */
        $permissions = config('roles.models.permission')::all();
        $farmerPermissions = [
            'view.farms',
            'create.farms',
            'edit.farms',
            'delete.farms',
        ];

        /**
         * Attach Permissions to Roles.
         */
        $roleAdmin = config('roles.models.role')::where('slug', '=', 'admin')->first();
        $roleFarmer = config('roles.models.role')::where('slug', '=', 'farmer')->first();
        foreach ($permissions as $permission) {
            $roleAdmin->attachPermission($permission);
            if (in_array($permission->slug, $farmerPermissions)) {
                $roleFarmer->attachPermission($permission);
            }
        }
    }
}
