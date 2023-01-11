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
        $randomCategory = \App\Models\Category::all()->random();
        while($randomCategory->childs->isNotEmpty()){
            $randomCategory = \App\Models\Category::all()->random();
        }
        return [
            'name'   => fake()->word(),
            'aprasymas'      => fake()->sentence(3),
            'category_id'=> $randomCategory->id
        ];
    }
}
