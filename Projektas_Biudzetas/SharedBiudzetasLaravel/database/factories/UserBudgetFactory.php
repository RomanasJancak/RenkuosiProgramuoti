<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserBudget>
 */
class UserBudgetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'budget_id'=> \App\Models\Budget::all()->random()->id,
            'user_id' => \App\Models\User::all()->random()->id
            //
        ];
    }
}
