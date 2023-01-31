<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

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
        $arrayOfBudgetRoles =[4,5,6];
        return [
            'budget_id'=> \App\Models\Budget::all()->random()->id,
            'user_id' => \App\Models\User::all()->random()->id,
            //'role_id'=> \App\Models\Role::all()->random()->id
            'role_id'   => Arr::random($arrayOfBudgetRoles,1)[0]
            //
        ];
    }
}
