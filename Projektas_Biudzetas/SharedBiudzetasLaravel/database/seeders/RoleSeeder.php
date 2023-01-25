<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([  'name'      =>  'superadmin']);
        Role::create([  
                        'name'      =>  'logedUser',
                        'parent_id' =>  1
                    ]);
        Role::create([  
                        'name'      =>  'moderatorius',
                        'parent_id' =>  1
                    ]);
    }
}
