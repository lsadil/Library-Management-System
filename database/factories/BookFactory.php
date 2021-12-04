<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'author' => $this->faker->name(),
            'category_id' => Category::factory(),
            'editor' => $this->faker->name(),
            'summary' => $this->faker->sentence(10, true),
            'ISBN' => $this->faker->isbn10(),
            'number_of_copies' => $this->faker->numberBetween(1, 20),
            'language' => $this->faker->word(),
            'year' => $this->faker->year(),
            'image_url' => $this->faker->imageUrl()
        ];
    }
}
