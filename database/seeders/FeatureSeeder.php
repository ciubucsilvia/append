<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = env('THEME') . '/images/features';
        
        $storage = Storage::disk('public');

        if($storage->exists($path)) {
            foreach($storage->files($path) as $file) {
                $storage->delete($file);
            }
        }
        
        \App\Models\Feature::factory(10)->create();
    }
}
