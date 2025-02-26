<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hole>
 */
class HoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_id'=> Course::factory(),
            'number'=> fake()->randomElement(range(1, 18)),
            'par'=> fake()->randomElement([3, 4, 5]),
            'stroke_index'=> fake()->randomElement(range(1, 18)),
        ];
    }
}
