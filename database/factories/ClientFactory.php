<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $path = env('THEME') . '/images/clients';
        
        if(!Storage::disk('public')->exists($path)) {
            $res = Storage::disk('public')->makeDirectory($path, 0755);
        }
        
        return [
            'name' => fake()->sentence(rand(3,8), true),
            'image' => fake()->image('public/storage/' . $path, 400, 140, null, false),
            'active' => rand(0, 1)
        ];
    }
}
