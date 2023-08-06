<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Membuat isi article otomatis secara random
        return [
            'title' => $this->faker->sentence(mt_rand(2,3)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(1,2),
            // 'body' => $this->faker->paragraphs(mt_rand(5,10)),
            // 'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(mt_rand(5,10))) . '</p>',
            'body' => collect($this->faker->paragraphs(mt_rand(5,10)))
                        // ->map(function($p) {
                        //     return "<p>$p</p>";
                        ->map(fn($p) => "<p>$p</p>")
                        ->implode(''),
            // 'user_id' => 1,
            // 'category_id' => 1
            'user_id' => mt_rand(1,5),
            'category_id' => mt_rand(1,4)
        ];
    }
}
