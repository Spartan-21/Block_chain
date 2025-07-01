<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Permission Types
         *
         */
        $Permissionitems = [
            [
                'name'        => 'Can View processing',
                'slug'        => 'view.processing',
                'description' => 'Can view processing',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can View Farms',
                'slug'        => 'view.farms',
                'description' => 'Can view farms',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create Farms',
                'slug'        => 'create.farms',
                'description' => 'Can create new farms',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Farms',
                'slug'        => 'edit.farms',
                'description' => 'Can edit farms',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Farms',
                'slug'        => 'delete.farms',
                'description' => 'Can delete farms',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can View batches',
                'slug'        => 'view.batches',
                'description' => 'Can view batches',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create batches',
                'slug'        => 'create.batches',
                'description' => 'Can create new batches',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit batches',
                'slug'        => 'edit.batches',
                'description' => 'Can edit batches',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete batches',
                'slug'        => 'delete.batches',
                'description' => 'Can delete batches',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can View Roles',
                'slug'        => 'view.roles',
                'description' => 'Can view roles',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create Roles',
                'slug'        => 'create.roles',
                'description' => 'Can create new roles',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Roles',
                'slug'        => 'edit.roles',
                'description' => 'Can edit roles',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Roles',
                'slug'        => 'delete.roles',
                'description' => 'Can delete roles',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can View Permissions',
                'slug'        => 'view.permissions',
                'description' => 'Can view permissions',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can View Users',
                'slug'        => 'view.users',
                'description' => 'Can view users',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Assign Roles to Users',
                'slug'        => 'assign.roles.to.users',
                'description' => 'Can assign roles to users',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Users',
                'slug'        => 'delete.users',
                'description' => 'Can delete users',
                'model'       => 'Permission',
            ],
        ];

        /*
         * Add Permission Items
         *
         */
        foreach ($Permissionitems as $Permissionitem) {
            $newPermissionitem = config('roles.models.permission')::where('slug', '=', $Permissionitem['slug'])->first();
            if ($newPermissionitem === null) {
                $newPermissionitem = config('roles.models.permission')::create([
                    'name'          => $Permissionitem['name'],
                    'slug'          => $Permissionitem['slug'],
                    'description'   => $Permissionitem['description'],
                    'model'         => $Permissionitem['model'],
                ]);
            }
        }
    }
}
