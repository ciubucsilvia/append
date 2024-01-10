<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(rand(2,6), true);
        $isPublished = rand(0, 1);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'image' => fake()
                ->image('public/storage/' . env('THEME') . '/images/posts', 
                    1024, 
                    768, 
                    null, 
                    false),
            'user_id' => 1,
            'is_published' => $isPublished,
            'published_at' => $isPublished 
                ? fake()->dateTimeBetween('-2 months', now()) 
                : null,
            'post_category_id' => rand(1, 5),
            'content' => fake()->realText(rand(1000, 4000))
        ];
    }
}
