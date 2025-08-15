<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subjects = [
            ['code' => 'MTK', 'name' => 'Matematika', 'credits' => 4, 'mandatory' => true],
            ['code' => 'BIN', 'name' => 'Bahasa Indonesia', 'credits' => 4, 'mandatory' => true],
            ['code' => 'ENG', 'name' => 'Bahasa Inggris', 'credits' => 3, 'mandatory' => true],
            ['code' => 'FIS', 'name' => 'Fisika', 'credits' => 3, 'mandatory' => true],
            ['code' => 'KIM', 'name' => 'Kimia', 'credits' => 3, 'mandatory' => true],
            ['code' => 'BIO', 'name' => 'Biologi', 'credits' => 3, 'mandatory' => true],
            ['code' => 'SEJ', 'name' => 'Sejarah', 'credits' => 2, 'mandatory' => true],
            ['code' => 'GEO', 'name' => 'Geografi', 'credits' => 2, 'mandatory' => false],
            ['code' => 'PKN', 'name' => 'PKN', 'credits' => 2, 'mandatory' => true],
            ['code' => 'SEN', 'name' => 'Seni Budaya', 'credits' => 2, 'mandatory' => false],
        ];

        $subject = $this->faker->randomElement($subjects);
        $number = $this->faker->unique()->numberBetween(1, 999);

        return [
            'code' => $subject['code'] . str_pad((string)$number, 3, '0', STR_PAD_LEFT),
            'name' => $subject['name'],
            'description' => $this->faker->sentence(),
            'credits' => $subject['credits'],
            'is_mandatory' => $subject['mandatory'],
            'is_active' => true,
        ];
    }
}