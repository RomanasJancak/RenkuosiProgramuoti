<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\apsipirkimas>
 */
class ApsipirkimasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'vendor_id'   => \App\Models\Vendor::all()->random()->id,
            'suma'      => 0,
            'shop_time' => fake()->date('Y_m_d').' '.fake()->time('H_i_s'),
            'budget_id'=> \App\Models\Budget::all()->random()->id
        ];
    }
}
