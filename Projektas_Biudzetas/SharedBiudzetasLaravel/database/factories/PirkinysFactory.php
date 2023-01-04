<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\pirkinys>
 */
class PirkinysFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'price'   => fake()->numberBetween(),
            'quantity'      => fake()->numberBetween(),
            'deposit' => fake()->numberBetween(10,25),
            'sum'=> fake()->numberBetween(),
            'prekepaslauga_id'=> fake()->numberBetween(),
            'apsipirkimas_id'=> \App\Models\Apsipirkimas::all()->random()->id,
        ];
    }
}
