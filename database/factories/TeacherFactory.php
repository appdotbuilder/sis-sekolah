<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'nip' => $this->faker->unique()->numerify('################'),
            'specialization' => $this->faker->randomElement([
                'Matematika', 'Bahasa Indonesia', 'Bahasa Inggris', 
                'Fisika', 'Kimia', 'Biologi', 'Sejarah', 'Geografi', 
                'PKN', 'Seni Budaya', 'Olahraga'
            ]),
            'qualifications' => $this->faker->randomElement([
                'S1 Pendidikan Matematika',
                'S1 Pendidikan Bahasa Indonesia',
                'S1 Pendidikan Bahasa Inggris',
                'S1 Pendidikan Fisika',
                'S1 Pendidikan Kimia',
                'S1 Pendidikan Biologi',
                'S1 Pendidikan Sejarah',
                'S1 Pendidikan Geografi',
                'S2 Pendidikan'
            ]),
            'hire_date' => $this->faker->dateTimeBetween('-10 years', '-1 year'),
            'salary' => $this->faker->randomFloat(2, 3000000, 8000000),
            'address' => $this->faker->address(),
            'is_homeroom_teacher' => $this->faker->boolean(30),
            'is_active' => true,
        ];
    }
}