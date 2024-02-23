<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $glav = rand(0, 1) ?: null;
        $pozits = null;
        if ($glav) {
            $pozits = rand(1, 2);
        }

        return [
            'name' => fake()->sentence(),
            'pod_text' => fake()->sentences(),
            'text' => fake()->paragraphs(),
            'date' => fake()->date(),
            'img' => $this->generateFilePath(),
            'project' => fake()->words(2),
            'rubrica' => fake()->words(2),
            'banner' => fake()->words(2),
            'glav' => $glav,
            'pozits' => $pozits,
            'img2' => rand(0, 2) ? null : $this->generateFilePath(),
            'img3' => rand(0, 3) ? null : $this->generateFilePath(),
            'img4' => rand(0, 4) ? null : $this->generateFilePath(),
            'img5' => rand(0, 5) ? null : $this->generateFilePath(),
            'img6' => rand(0, 6) ? null : $this->generateFilePath(),
            'video' => null,
            'img7' => rand(0, 7) ? null : $this->generateFilePath(),
        ];
    }

    protected function generateFilePath(): string
    {
        return '/storage/' . rand(10000, 999999) . '_image.jpg';
    }
}
