<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            ClientSeeder::class,
            ServiceSeeder::class,
            FeatureSeeder::class,
            ProjectCategorySeeder::class,
            ProjectSeeder::class,
            QuestionSeeder::class,
            UserSeeder::class,
            TestimonialSeeder::class,
            PostCategorySeeder::class,
            TagSeeder::class,
            PostSeeder::class,
            CommentSeeder::class
        ]);
    }
}
