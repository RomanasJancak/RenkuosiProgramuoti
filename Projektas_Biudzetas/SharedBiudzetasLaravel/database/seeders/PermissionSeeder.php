<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //pirmajam sukurtam vartotojui prisikirti aukščiausias teises

        $permissions =  [
            'user-view',
            'user-create',
            'user-edit',
            'user-delete',
            'budget-view-owner',
            'budget-view-editor',
            'budget-view-viewer',
            'budget-create-owner',
            'budget-create-editor',
            'budget-create-viewer',
            'budget-edit-owner',
            'budget-edit-editor',
            'budget-edit-viewe',
            'budget-delete-owner',
            'budget-delete-editor',
            'budget-delete-viewer',
            'apsipirkimas-view',
            'apsipirkimas-create',
            'apsipirkimas-edit',
            'apsipirkimas-delete',
            'category-view',
            'category-create',
            'category-edit',
            'category-delete',
            'pirkinys-view',
            'pirkinys-create',
            'pirkinys-edit',
            'pirkinys-delete',
            'prekePaslauga-view',
            'prekePaslauga-create',
            'prekePaslauga-edit',
            'prekePaslauga-delete',
            'vendor-view',
            'vendor-create',
            'vendor-edit',
            'vendor-delete',
            'role-view',
            'role-create',
            'role-edit',
            'role-delete',
            'permission-view',
            'permission-create',
            'permission-edit',
            'permission-delete',
        ];

        foreach($permissions as $permission){
            Permission::create(['name'=> $permission]);
        }
    }
}
