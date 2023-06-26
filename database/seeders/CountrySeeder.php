<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create(['name' => 'Lithuania']);
        Country::create(['name' => 'Latvia']);
        Country::create(['name' => 'Poland']);
        Country::create(['name' => 'Germany']);
        Country::create(['name' => 'Belgium']);
        Country::create(['name' => 'United Kingdom']);
        Country::create(['name' => 'Spain']);          
    }
}
