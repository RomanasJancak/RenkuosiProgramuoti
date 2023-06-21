<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Pakvietimas;
use Illuminate\Database\Seeder;

class PakvietimasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pakvietimas::create([   'model_type_what'   =>  'App\Models\Budget',
                                'model_id_what'     =>  2,
                                'model_type_with'   =>  'App\Models\User',
                                'model_id_with'     =>  1,
                                'model_type_who'    =>  'App\Models\User',
                                'model_id_who'      =>  2,
                                'role_id'           =>  6
                            ]);
    }
    
}
