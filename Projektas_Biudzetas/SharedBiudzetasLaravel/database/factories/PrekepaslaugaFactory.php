<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\prekepaslauga>
 */
class PrekepaslaugaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'   => fake()->word(),
            'aprasymas'      => fake()->sentence(3),
            'kategorija'=> \App\Models\Category::all()->random()->id
        ];
    }
}
