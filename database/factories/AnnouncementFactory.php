<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isPublished = $this->faker->boolean(80);
        
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraphs(3, true),
            'image' => $this->faker->optional()->imageUrl(),
            'type' => $this->faker->randomElement(['general', 'academic', 'event', 'urgent']),
            'target_audience' => $this->faker->randomElement(['all', 'students', 'teachers', 'parents']),
            'is_featured' => $this->faker->boolean(20),
            'is_published' => $isPublished,
            'published_at' => $isPublished ? $this->faker->dateTimeBetween('-1 month', 'now') : null,
        ];
    }
}