<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = env('THEME') . '/images/comment-users';
        $storage = Storage::disk('public');

        if($storage->exists($path)) {
            foreach($storage->files($path) as $file) {
                $storage->delete($file);
            }
        }

        \App\Models\Comment::factory(100)->create();
    }
}
