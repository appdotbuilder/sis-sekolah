<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            [
                'code' => 'MTK001',
                'name' => 'Matematika',
                'description' => 'Matematika dasar dan lanjutan',
                'credits' => 4,
                'is_mandatory' => true
            ],
            [
                'code' => 'BIN001',
                'name' => 'Bahasa Indonesia',
                'description' => 'Bahasa Indonesia dan Sastra',
                'credits' => 4,
                'is_mandatory' => true
            ],
            [
                'code' => 'ENG001',
                'name' => 'Bahasa Inggris',
                'description' => 'English Language and Literature',
                'credits' => 3,
                'is_mandatory' => true
            ],
            [
                'code' => 'FIS001',
                'name' => 'Fisika',
                'description' => 'Ilmu Fisika dan Aplikasinya',
                'credits' => 3,
                'is_mandatory' => true
            ],
            [
                'code' => 'KIM001',
                'name' => 'Kimia',
                'description' => 'Ilmu Kimia dan Praktikum',
                'credits' => 3,
                'is_mandatory' => true
            ],
            [
                'code' => 'BIO001',
                'name' => 'Biologi',
                'description' => 'Ilmu Biologi dan Ekosistem',
                'credits' => 3,
                'is_mandatory' => true
            ],
            [
                'code' => 'SEJ001',
                'name' => 'Sejarah',
                'description' => 'Sejarah Indonesia dan Dunia',
                'credits' => 2,
                'is_mandatory' => true
            ],
            [
                'code' => 'GEO001',
                'name' => 'Geografi',
                'description' => 'Geografi Fisik dan Sosial',
                'credits' => 2,
                'is_mandatory' => false
            ],
            [
                'code' => 'PKN001',
                'name' => 'Pendidikan Kewarganegaraan',
                'description' => 'Pendidikan Pancasila dan Kewarganegaraan',
                'credits' => 2,
                'is_mandatory' => true
            ],
            [
                'code' => 'SEN001',
                'name' => 'Seni Budaya',
                'description' => 'Seni Rupa, Musik, dan Budaya',
                'credits' => 2,
                'is_mandatory' => false
            ]
        ];

        foreach ($subjects as $subject) {
            Subject::firstOrCreate(
                ['code' => $subject['code']],
                $subject
            );
        }
    }
}