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
        $price  =   fake()->numberBetween(0,1000);
        $quantity   =   fake()->numberBetween(1,3);
        $deposit    =   fake()->numberBetween(10,25);
        return [
            'price'   => $price,
            'quantity'      => $quantity,
            'deposit' => $deposit,
            'sum'=> $quantity*($price+$deposit),
            'prekepaslauga_id'=> \App\Models\Prekepaslauga::all()->random()->id,
            'apsipirkimas_id'=> \App\Models\Apsipirkimas::all()->random()->id
        ];
    }
}
