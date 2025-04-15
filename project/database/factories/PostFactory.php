<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
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
            'title' => $this->faker->name(),
            'content' => $this->faker->text(100),
            'likes' => random_int(1, 10000),
            'image_storage_url' => random_int(1, 3) . ".png",
            'category_id' => Category::get()->random()->id,
            'user_id' => User::get()->random()->id,
        ];
    }
}
