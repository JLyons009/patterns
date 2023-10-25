<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Paragraph;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Read story.txt
        $story = file_get_contents(base_path() . '/resources/story/story.txt');

        // Split into paragraphs
        $paragraphs = explode("\n\n", $story);

        // Create paragraphs
        foreach ($paragraphs as $paragraph) {
            Paragraph::create([
                'content' => $paragraph,
            ]);
        }
    }
}
