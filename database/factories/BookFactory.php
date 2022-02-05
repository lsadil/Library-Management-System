<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Keyword;
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
            'category_id' => $this->faker->numberBetween(1, 5),
            'editor' => $this->faker->name(),
            'summary' => $this->faker->sentence(20, true),
            'ISBN' => $this->faker->isbn10(),
            'number_of_copies' => $this->faker->numberBetween(1, 20),
            'language' => $this->faker->randomElement(['English', 'French', 'Arabic', 'Japanese', 'Spanish']),
            'year' => $this->faker->year(),
            'image_url' => $this->faker->imageUrl(),
            'added_in' => $this->faker->dateTimeBetween('-1 year', 'now')
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Book $book) {
            Keyword::factory(2)->create(['book_id' => $book->id]);
        });
    }
}
