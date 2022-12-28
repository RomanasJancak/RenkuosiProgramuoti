<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $number = 3;
        $budgetfactor = 2;
        $relation_userBudgetFactor = 2;
        $apsipirkimasFactor = 10;
        \App\Models\User::factory($number)->create();
        //\App\Models\Budget::factory(10)->create();
        \App\Models\Budget::factory()->count($number*$budgetfactor)->create();
        \App\Models\UserBudget::factory($number*$budgetfactor*$relation_userBudgetFactor)->create();
        \App\Models\Apsipirkimas::factory($number*$budgetfactor*$apsipirkimasFactor)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
