<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->words(rand(1,3), true);
        
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'icon' => 'briefcase',
            'image' => fake()
                ->image('public/storage/' . env('THEME') . '/images/services', 
                    1024, 
                    648, 
                    null, 
                    false),
            'description' => fake()->text(200),
            'content' => fake()->text(1500),
            'active' => rand(0, 1)
        ];
    }
}
