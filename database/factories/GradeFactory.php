<?php

namespace Database\Factories;

use App\Models\Assignment;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grade>
 */
class GradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $score = $this->faker->randomFloat(2, 0, 100);
        
        $grade = match(true) {
            $score >= 90 => 'A',
            $score >= 80 => 'B',
            $score >= 70 => 'C',
            $score >= 60 => 'D',
            default => 'E'
        };

        return [
            'student_id' => Student::factory(),
            'subject_id' => Subject::factory(),
            'assignment_id' => Assignment::factory(),
            'score' => $score,
            'grade' => $grade,
            'type' => $this->faker->randomElement(['quiz', 'assignment', 'midterm', 'final', 'project']),
            'semester' => $this->faker->randomElement(['Ganjil', 'Genap']),
            'academic_year' => $this->faker->randomElement(['2023/2024', '2024/2025']),
            'notes' => $this->faker->optional()->sentence(),
        ];
    }
}