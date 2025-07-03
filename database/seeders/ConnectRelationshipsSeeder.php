<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConnectRelationshipsSeeder extends Seeder
{
    public function run()
    {
        $permissions = config('roles.models.permission')::all();

        $rolePermissions = [
            'admin' => $permissions->pluck('slug')->toArray(),

            'farmer' => [
                'view.farms',
                'create.farms',
                'edit.farms',
                'delete.farms',
                'view.batches',
                'create.batches',
                'edit.batches',
                'delete.batches',
            ],

            'processor' => [
                'view.processing',
                'create.processing',
                'edit.processing',
                'show.processing',
            ],

            'quality.control' => [   
                'view.quality.control',
                'create.quality.control',
                'edit.quality.control',
                'delete.quality.control',
                'show.quality.control',
            ],

            'distribution' => [
                'view.distribution',
                'show.distribution',
                'create.distribution',
                'edit.distribution',
                'delete.distribution',
            ],
        ];
        $roleAdmin = config('roles.models.role')::where('slug', '=', 'admin')->first();
        foreach ($rolePermissions as $roleSlug => $permissionSlugs) {
            $role = config('roles.models.role')::where('slug', $roleSlug)->first();

            if (!$role) {
                $this->command->warn("Role '{$roleSlug}' not found!");
                continue;
            }

            // Detach all current permissions before attaching new ones
            $role->detachAllPermissions();

            foreach ($permissions as $permission) {
                if (in_array($permission->slug, $permissionSlugs)) {
                    $role->attachPermission($permission);
                }
            }

            $this->command->info("Attached permissions to role '{$roleSlug}'");
        }

        // ✅ Fix here: attach admin role by model, NOT by slug string
        if ($adminUser = config('roles.models.defaultUser')::first()) {
            $adminUser->detachAllRoles();

            $adminRole = config('roles.models.role')::where('slug', 'admin')->first();

            if ($adminRole) {
                $adminUser->attachRole($adminRole);
                $this->command->info("Attached admin role to first user");
            } else {
                $this->command->warn("Admin role not found, cannot attach to first user");
            }
        }
    }
}
