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
        $t = $this->faker->dateTimeBetween('-1 year', 'now');
        $t2 = $this->faker->dateTimeBetween($t, 'now');
        return [
            'subscriber_id' => $this->faker->numberBetween(1, 25),
            'book_id' => $this->faker->numberBetween(1, 100),
            'loan_start' => $t,
            'loan_end' => $t2,
            'loan_turn_in' => $this->faker->dateTimeBetween($t, $t2),
        ];
    }
}
