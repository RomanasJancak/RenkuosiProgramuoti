<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
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
        $budgetfactor = 2*$number;
        $relation_userBudgetFactor = 2*$budgetfactor;
        $apsipirkimasFactor = 10*$budgetfactor;
        $pirkinysFactor = 5*$apsipirkimasFactor;
        $categoryFactor = 10;
        \App\Models\User::factory($number)->create();
        //\App\Models\Budget::factory(10)->create();
        \App\Models\Category::factory($categoryFactor)->create();
        $kat = new Category();
        $kat->createWithFake(100);
        \App\Models\Budget::factory()->count($budgetfactor)->create();
        \App\Models\UserBudget::factory($relation_userBudgetFactor)->create();
        \App\Models\Vendor::factory(5)->create();
        \App\Models\Apsipirkimas::factory($apsipirkimasFactor)->create();
        \App\Models\Prekepaslauga::factory($pirkinysFactor)->create();
        \App\Models\Pirkinys::factory($pirkinysFactor)->create();
        \App\Models\Flat::factory(50)->create();
        
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
