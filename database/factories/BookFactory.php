<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'author' => $this->faker->name,
            'editor' => $this->faker->name,
            'summary' => $this->faker->sentences,
            'ISBN' => $this->faker->isbn10(),
            'number_of_copies' => $this->faker->numberBetween(1,20),
            'manguage' => $this->faker->word,
            'number_of_copies' => $this->faker->word,
        ];
    }
}
