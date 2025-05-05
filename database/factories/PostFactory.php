<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'slug' =>fake()->sentence(5) ,
            'body' => fake()->sentence(4),
            'is_published' => false,
            'publish_date' =>fake()->date,
            'meta_description' =>fake()->sentence(4) ,
            'tags' => fake()->sentence(4),
            'keywords' => fake()->sentence(4),
        ];
    }
}
