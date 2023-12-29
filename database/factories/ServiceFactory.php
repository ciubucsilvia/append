<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
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
        $path = env('THEME') . '/images/services';
        
        if(!Storage::disk('public')->exists($path)) {
            $res = Storage::disk('public')->makeDirectory($path, 0755);
        }

        $title = fake()->sentence(rand(3,8), true);
        
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'icon' => 'briefcase',
            'image' => fake()->image('public/storage/' . $path, 1024, 648, null, false),
            'description' => fake()->text(200),
            'content' => fake()->text(1500),
            'active' => rand(0, 1)
        ];
    }
}
