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
