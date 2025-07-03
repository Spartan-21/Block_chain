<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Role Types
         */
        $RoleItems = [
            [
                'name'        => 'Admin',
                'slug'        => 'admin',
                'description' => 'Admin Role',
                'level'       => 0,
            ],
            [
                'name'        => 'Farmer',
                'slug'        => 'farmer',
                'description' => 'Farmer Role',
                'level'       => 0,
            ],
            [
                'name'        => 'Processor',
                'slug'        => 'processor',
                'description' => 'Processor Role',
                'level'       => 0,
            ],
            [
                'name'        => 'Quality Control',
                'slug'        => 'quality.control',   // dot here
                'description' => 'Quality Control Role',
                'level'       => 0,
            ],
            [
                'name'        => 'Distribution',
                'slug'        => 'distribution',
                'description' => 'Distribution Role',
                'level'       => 0,
            ],
           
    
            [
                'name'        => 'End User',
                'slug'        => 'end.user',
                'description' => 'End User Role',
                'level'       => 0,
            ],
        ];

        /*
         * Add Role Items
         */
        foreach ($RoleItems as $RoleItem) {
            $newRoleItem = config('roles.models.role')::where('slug', '=', $RoleItem['slug'])->first();
            if ($newRoleItem === null) {
                config('roles.models.role')::create([
                    'name'          => $RoleItem['name'],
                    'slug'          => $RoleItem['slug'],
                    'description'   => $RoleItem['description'],
                    'level'         => $RoleItem['level'],
                ]);
            }
        }
    }
}
