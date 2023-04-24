<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence;

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'chapo' => $this->faker->paragraph,
            'content' => $this->faker->paragraph,
        ];
    }

    public function published(): static
    {
        return $this->state(['published' => 'published']);
    }

    public function unpublished(): static
    {
        return $this->state(['published' => 'unpublished']);
    }

    public function withComments(int $int): static
    {
        return $this->state(['comments' => CommentFactory::new()->count($int)]);
    }
}
