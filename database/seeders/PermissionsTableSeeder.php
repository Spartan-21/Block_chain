<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $Permissionitems = [
            // Existing permissions (farms, batches, roles, users, processing)
            [
                'name'        => 'Can View Processing',
                'slug'        => 'view.processing',
                'description' => 'Can view processing',
                'model'       => 'Permission',
            ],
            // Add all your other existing permissions here, for brevity omitted...
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
            // Processing-specific permissions
            [
                'name'        => 'Can Create Processing',
                'slug'        => 'create.processing',
                'description' => 'Can create new processing records',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Processing',
                'slug'        => 'edit.processing',
                'description' => 'Can edit processing records',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Processing',
                'slug'        => 'delete.processing',
                'description' => 'Can delete processing records',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can View Processing Details',
                'slug'        => 'show.processing',
                'description' => 'Can view detailed processing information',
                'model'       => 'Permission',
            ],

            // Distribution-specific permissions
            [
                'name'        => 'Can View Distribution',
                'slug'        => 'view.distribution',
                'description' => 'Can view distribution records',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create Distribution',
                'slug'        => 'create.distribution',
                'description' => 'Can create new distribution records',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Distribution',
                'slug'        => 'edit.distribution',
                'description' => 'Can edit distribution records',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Distribution',
                'slug'        => 'delete.distribution',
                'description' => 'Can delete distribution records',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can View Distribution Details',
                'slug'        => 'show.distribution',
                'description' => 'Can view detailed distribution information',
                'model'       => 'Permission',
            ],

            // Quality Control-specific permissions
            [
                'name'        => 'Can View Quality Control',
                'slug'        => 'view.quality.control',
                'description' => 'Can view quality control records',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create Quality Control',
                'slug'        => 'create.quality.control',
                'description' => 'Can create quality control records',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Quality Control',
                'slug'        => 'edit.quality.control',
                'description' => 'Can edit quality control records',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Quality Control',
                'slug'        => 'delete.quality.control',
                'description' => 'Can delete quality control records',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can View Quality Control Details',
                'slug'        => 'show.quality.control',
                'description' => 'Can view detailed quality control information',
                'model'       => 'Permission',
            ],
        ];

        foreach ($Permissionitems as $Permissionitem) {
            $existing = config('roles.models.permission')::where('slug', $Permissionitem['slug'])->first();
            if ($existing === null) {
                config('roles.models.permission')::create([
                    'name'          => $Permissionitem['name'],
                    'slug'          => $Permissionitem['slug'],
                    'description'   => $Permissionitem['description'],
                    'model'         => $Permissionitem['model'],
                ]);
            }
        }
    }
}
