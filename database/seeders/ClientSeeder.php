<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = env('THEME') . '/images/clients';
        $storage = Storage::disk('public');

        if($storage->exists($path)) {
            foreach($storage->files($path) as $file) {
                $storage->delete($file);
            }
        }
        
        \App\Models\Client::factory(10)->create();
    }
}
