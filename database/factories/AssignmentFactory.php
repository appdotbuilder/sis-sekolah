<?php

namespace Database\Factories;

use App\Models\SchoolClass;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assignment>
 */
class AssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'teacher_id' => Teacher::factory(),
            'subject_id' => Subject::factory(),
            'class_id' => SchoolClass::factory(),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraphs(2, true),
            'instructions' => $this->faker->optional()->paragraphs(1, true),
            'due_date' => $this->faker->dateTimeBetween('+1 day', '+1 month'),
            'max_score' => $this->faker->numberBetween(50, 100),
            'attachment' => $this->faker->optional()->word() . '.pdf',
            'type' => $this->faker->randomElement(['homework', 'project', 'quiz', 'exam']),
            'status' => $this->faker->randomElement(['draft', 'published', 'closed']),
        ];
    }
}