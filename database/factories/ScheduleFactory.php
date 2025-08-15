<?php

namespace Database\Factories;

use App\Models\SchoolClass;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startHour = $this->faker->numberBetween(7, 15);
        $endHour = $startHour + $this->faker->numberBetween(1, 2);
        
        return [
            'class_id' => SchoolClass::factory(),
            'subject_id' => Subject::factory(),
            'teacher_id' => Teacher::factory(),
            'day' => $this->faker->randomElement(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday']),
            'start_time' => sprintf('%02d:00:00', $startHour),
            'end_time' => sprintf('%02d:00:00', $endHour),
            'room' => $this->faker->randomElement(['A101', 'A102', 'B201', 'B202', 'Lab Komputer', 'Lab Fisika', 'Lab Kimia']),
            'semester' => $this->faker->randomElement(['Ganjil', 'Genap']),
            'academic_year' => $this->faker->randomElement(['2023/2024', '2024/2025']),
            'is_active' => true,
        ];
    }
}