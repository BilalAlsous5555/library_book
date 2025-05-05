<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        // custom states
        Post::factory()->state([
            'title' => 'title_test',
            'slug' => 'slug_test',
            'body' => 'body_test',
            'is_published' => true,
            'publish_date' => now(),
            'meta_description' => '',
            'tags' => 'tags_test',
            'keywords' => 'keyword_test',
            'body' => 'body_test',
            ])->create();

        Post::factory()->state([
            'title' => 'title_test_2',
            'slug' => '',
            'body' => 'body_test_2',
            'is_published' => true,
            'publish_date' => now(),
            'meta_description' => '',
            'tags' => 'tags_test_2',
            'keywords' => 'keyword_test_2',
            'body' => 'body_test_2',
            ])->create();
    }
}
