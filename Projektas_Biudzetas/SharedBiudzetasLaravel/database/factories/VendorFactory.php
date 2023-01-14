<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vendor>
 */
class VendorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->company();
        return [
            //            'vendor_id'   => \App\Models\Vendor::all()->random()->id,
            // 'suma'      => fake()->numberBetween(),
            // 'shop_time' => fake()->date('Y_m_d').' '.fake()->time('H_i_s'),
            // 'budget_id'=> \App\Models\Budget::all()->random()->
            'name'      =>  $name,
            'ChainName' =>  $name.' '.fake()->companySuffix(),
            'adress'    =>  fake()->city().' '.fake()->word(3),
            'code'      =>  fake()->numberBetween(),
            'vatcode'   =>  'LT '.fake()->numberBetween()
        ];
    }
}
