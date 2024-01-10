<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = env('THEME') . '/images/projects';
        $storage = Storage::disk('public');

        if($storage->exists($path)) {
            foreach($storage->files($path) as $file) {
                $storage->delete($file);
            }
        }

        \App\Models\Project::factory(50)->create();
    }
}
