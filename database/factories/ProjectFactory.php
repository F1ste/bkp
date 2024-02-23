<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Project;
use App\Models\Region;
use App\Models\Role;
use App\Models\Subject;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model|TModel>
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create()->id,
            'name' => fake()->sentence(),
            'images' => $this->generateFilePath(),
            'excerpt' => fake()->sentence(),
            'date_service_from' => fake()->date(),
            'date_service_to' => fake()->date(),
            'status' => Project::STATUS_PUBLISHED,
            'region' => Region::query()->inRandomOrder()->first('name')->name,
            'tip' => Event::query()->inRandomOrder()->first('name')->name,
            'teg' => Tag::query()->inRandomOrder()->take(rand(1, 3))->pluck('name')->toJson(),
            'tema' => Subject::query()->inRandomOrder()->first('name')->name,
            'tel' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'name_proj' => fake()->words(),
            'video' => null,
            'serch' => $this->generateSearch(),
            'img1' => rand(0, 1) ? null : $this->generateFilePath(),
            'img2' => rand(0, 2) ? null : $this->generateFilePath(),
            'img3' => rand(0, 3) ? null : $this->generateFilePath(),
            'img4' => rand(0, 4) ? null : $this->generateFilePath(),
            'img5' => rand(0, 5) ? null : $this->generateFilePath(),
            'img6' => rand(0, 6) ? null : $this->generateFilePath(),
        ];
    }

    protected function generateFilePath(): string
    {
        return '/storage/' . rand(10000, 999999) . '_image.jpg';
    }

    protected function generateSearch(): string
    {
        $roles = Role::query()->inRandomOrder()->take(rand(1, 3))->pluck('name')->map(fn ($role) => [
            'sel' => $role,
            'tex' => fake()->sentences(),
            'inp' => fake()->date('d.m.Y'),
        ]);

        return json_encode($roles);
    }
}
