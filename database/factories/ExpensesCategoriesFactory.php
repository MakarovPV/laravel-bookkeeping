<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpensesCategoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'source_of_expenses' => $this->faker->word,
            'price' => $this->faker->numberBetween(100, 500),
        ];
    }

}
