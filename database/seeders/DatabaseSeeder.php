<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            SubjectSeeder::class,
            SchoolClassSeeder::class,
        ]);

        // Create admin user
        $adminRole = Role::where('name', 'admin')->first();
        User::factory()->create([
            'name' => 'Admin SIS',
            'email' => 'admin@sis.com',
            'role_id' => $adminRole->id,
        ]);

        // Create teacher user
        $teacherRole = Role::where('name', 'teacher')->first();
        User::factory()->create([
            'name' => 'Teacher Demo',
            'email' => 'teacher@sis.com',
            'role_id' => $teacherRole->id,
        ]);

        // Create student user
        $studentRole = Role::where('name', 'student')->first();
        User::factory()->create([
            'name' => 'Student Demo',
            'email' => 'student@sis.com',
            'role_id' => $studentRole->id,
        ]);

        // Create parent user
        $parentRole = Role::where('name', 'parent')->first();
        User::factory()->create([
            'name' => 'Parent Demo',
            'email' => 'parent@sis.com',
            'role_id' => $parentRole->id,
        ]);
    }
}
