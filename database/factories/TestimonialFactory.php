<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'occupation' => fake()->jobTitle(),
            'message' => fake()->text(rand(100, 300)),
            'rating' => rand(3, 5),
            'image' => fake()
                ->image('public/storage/' . env('THEME') . '/images/testimonials', 
                    600, 
                    600, 
                    null, 
                    false),
            'active' => 1
        ];
    }
}
