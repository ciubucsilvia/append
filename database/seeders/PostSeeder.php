<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = env('THEME') . '/images/posts';
        $storage = Storage::disk('public');

        if($storage->exists($path)) {
            foreach($storage->files($path) as $file) {
                $storage->delete($file);
            }
        }
        
        \App\Models\Post::factory(50)->create();

        for($i = 1; $i <= 50; $i++) {
            DB::table('post_tags')->insert([
                'post_id' => $i,
                'tag_id' => rand(1, 10)
            ]);
        }
    }
}
