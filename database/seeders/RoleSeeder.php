<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'Administrator',
                'description' => 'Full access to all system features and data management'
            ],
            [
                'name' => 'teacher',
                'display_name' => 'Teacher',
                'description' => 'Access to teaching tools, grades, assignments, and class management'
            ],
            [
                'name' => 'student',
                'display_name' => 'Student',
                'description' => 'Access to assignments, grades, schedules, and educational materials'
            ],
            [
                'name' => 'parent',
                'display_name' => 'Parent',
                'description' => 'Access to child\'s academic progress, grades, and school communications'
            ],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(
                ['name' => $role['name']],
                $role
            );
        }
    }
}