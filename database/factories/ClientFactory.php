<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'name' => fake()->sentence(rand(3,8), true),
            'image' => fake()
                ->image('public/storage/' . env('THEME') . '/images/clients',
                    400, 
                    140, 
                    null, 
                    false),
            'active' => rand(0, 1)
        ];
    }
}
