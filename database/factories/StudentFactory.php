<?php

namespace Database\Factories;

use App\Models\SchoolClass;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $birthDate = $this->faker->dateTimeBetween('-18 years', '-15 years');
        
        return [
            'user_id' => User::factory(),
            'class_id' => SchoolClass::factory(),
            'nis' => $this->faker->unique()->numerify('##########'),
            'nisn' => $this->faker->unique()->numerify('##########'),
            'birth_date' => $birthDate,
            'birth_place' => $this->faker->city(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'address' => $this->faker->address(),
            'parent_name' => $this->faker->name(),
            'parent_phone' => $this->faker->phoneNumber(),
            'parent_email' => $this->faker->optional()->email(),
            'enrollment_date' => $this->faker->dateTimeBetween('-3 years', 'now'),
            'status' => $this->faker->randomElement(['active', 'inactive', 'graduated', 'transferred']),
        ];
    }
}