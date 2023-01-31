<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([  'name'      =>  'superadmin']);//1
        Role::create([  
                        'name'      =>  'moderatorius',//2
                        'parent_id' =>  1
                    ]);
        Role::create([ //3 
                        'name'      =>  'logedUser',
                        'parent_id' =>  2
                    ]);
        Role::create([//4
                        'name'      =>  'budget_owner',
                        'parent_id' =>  '1'
                    ]);
        Role::create([//5
                        'name'      =>  'budget_editor',
                        'parent_id' =>  '4'
                    ]);
        Role::create([//6
                        'name'      =>  'budget_viewer',
                        'parent_id' =>  '4'
                    ]);
                    
        
    }
}
