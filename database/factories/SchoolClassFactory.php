<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SchoolClass>
 */
class SchoolClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $level = $this->faker->randomElement(['10', '11', '12']);
        $major = $level === '10' ? null : $this->faker->randomElement(['IPA', 'IPS']);
        $section = $this->faker->randomElement(['A', 'B', 'C', '1', '2']);
        
        $name = $level === '10' 
            ? "X-{$section}"
            : ($level === '11' ? "XI-{$major}-{$section}" : "XII-{$major}-{$section}");

        return [
            'name' => $name,
            'level' => $level,
            'major' => $major,
            'description' => "Kelas {$level} " . ($major ? $major . ' ' : '') . $section,
            'capacity' => $this->faker->numberBetween(25, 35),
            'current_students' => $this->faker->numberBetween(20, 30),
            'is_active' => true,
        ];
    }
}