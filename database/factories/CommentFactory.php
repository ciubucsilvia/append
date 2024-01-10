<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_id' => rand(1, 50),
            'comment' => fake()->realText(rand(500, 1500)),
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'image' => fake()
                ->image('public/storage/' . env('THEME') . '/images/comment-users', 
                    1000, 
                    700, 
                    null, 
                    false),
            'comment_id' => rand(0, 20),
            'user_id' => rand(0, 1),
            'website' => fake()->url
        ];
    }
}
