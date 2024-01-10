<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feature>
 */
class FeatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(rand(3,8), true);
        
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'image' => fake()
                ->image('public/storage/' . env('THEME') . '/images/features', 
                    1000, 
                    700, 
                    null, 
                    false),
            'content' => fake()->text(300),
            'active' => rand(0, 1)
        ];
    }
}
