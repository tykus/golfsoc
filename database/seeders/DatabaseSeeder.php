<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        collect([
            \App\Models\Course::class => database_path('seeders/courses.json'),
            \App\Models\Hole::class => database_path('seeders/holes.json'),
        ])->each(function ($path, $model) {
            throw_unless(File::exists($path), new FileNotFoundException(path: $path));
            collect(File::json($path))->each(fn($seed) => $model::factory()->create($seed));
        });
    }
}
