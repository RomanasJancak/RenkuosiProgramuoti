<?php

namespace Database\Factories;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    public static $id=0;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {          
        CategoryFactory::$id++;   
        return [
            //'name' => fake()->word(),
            'name' => 'A'.CategoryFactory::$id,
            'parent_id'=> 0
                ];
    }
}
