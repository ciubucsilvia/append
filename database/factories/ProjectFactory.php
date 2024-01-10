<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(rand(2,6), true);
        $txt = fake()->realText(rand(1000, 4000));
        $isPublished = rand(0, 1);

        $images = [];
        for($i = 0; $i < 3; $i++) {
            $images[] = fake()
                ->image('public/storage/' . env('THEME') . '/images/projects', 
                    1024, 
                    768, 
                    null, 
                    false);
        }

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => fake()->sentence(rand(2,20)),
            'image' => json_encode($images),
            'url' => fake()->url(),
            'project_category_id' => rand(1, 10),
            'client_id' => rand(1, 10),
            'content' => $txt,
            'is_published' => $isPublished,
            'published_at' => $isPublished 
                ? fake()->dateTimeBetween('-2 months', now()) 
                : null
        ];
    }
}
