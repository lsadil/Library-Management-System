<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subscriber_id' => $this->faker->numberBetween(1, 25),
            'book_id' => $this->faker->numberBetween(1, 100),
            'loan_start' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'loan_end' => $this->faker->dateTimeBetween('now', '1 year')
        ];
    }
}
