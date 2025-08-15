<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use Illuminate\Database\Seeder;

class SchoolClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            // Grade 10
            [
                'name' => 'X-A',
                'level' => '10',
                'major' => null,
                'description' => 'Kelas 10 A',
                'capacity' => 30
            ],
            [
                'name' => 'X-B',
                'level' => '10',
                'major' => null,
                'description' => 'Kelas 10 B',
                'capacity' => 30
            ],
            [
                'name' => 'X-C',
                'level' => '10',
                'major' => null,
                'description' => 'Kelas 10 C',
                'capacity' => 30
            ],
            
            // Grade 11 IPA
            [
                'name' => 'XI-IPA-1',
                'level' => '11',
                'major' => 'IPA',
                'description' => 'Kelas 11 IPA 1',
                'capacity' => 30
            ],
            [
                'name' => 'XI-IPA-2',
                'level' => '11',
                'major' => 'IPA',
                'description' => 'Kelas 11 IPA 2',
                'capacity' => 30
            ],
            
            // Grade 11 IPS
            [
                'name' => 'XI-IPS-1',
                'level' => '11',
                'major' => 'IPS',
                'description' => 'Kelas 11 IPS 1',
                'capacity' => 30
            ],
            [
                'name' => 'XI-IPS-2',
                'level' => '11',
                'major' => 'IPS',
                'description' => 'Kelas 11 IPS 2',
                'capacity' => 30
            ],
            
            // Grade 12 IPA
            [
                'name' => 'XII-IPA-1',
                'level' => '12',
                'major' => 'IPA',
                'description' => 'Kelas 12 IPA 1',
                'capacity' => 30
            ],
            [
                'name' => 'XII-IPA-2',
                'level' => '12',
                'major' => 'IPA',
                'description' => 'Kelas 12 IPA 2',
                'capacity' => 30
            ],
            
            // Grade 12 IPS
            [
                'name' => 'XII-IPS-1',
                'level' => '12',
                'major' => 'IPS',
                'description' => 'Kelas 12 IPS 1',
                'capacity' => 30
            ],
            [
                'name' => 'XII-IPS-2',
                'level' => '12',
                'major' => 'IPS',
                'description' => 'Kelas 12 IPS 2',
                'capacity' => 30
            ]
        ];

        foreach ($classes as $class) {
            SchoolClass::firstOrCreate(
                ['name' => $class['name']],
                $class
            );
        }
    }
}