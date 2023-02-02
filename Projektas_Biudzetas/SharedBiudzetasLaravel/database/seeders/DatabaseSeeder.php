<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use \App\Models\User;
use \App\Models\Role;
use Spatie\Permission\Models\Permission;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class
        ]);
        $number = 3;
        $budgetfactor = 2*$number;
        $relation_userBudgetFactor = 2*$budgetfactor;
        $apsipirkimasFactor = 10*$budgetfactor;
        $pirkinysFactor = 5*$apsipirkimasFactor;
        $categoryFactor = 10;
        \App\Models\User::factory($number)->create();
        \App\Models\Category::factory($categoryFactor)->create();
        $kat = new Category();
        $kat->createWithFake(100);
        \App\Models\Budget::factory()->count($budgetfactor)->create();
        //\App\Models\UserBudget::factory($relation_userBudgetFactor)->create();
        $this->call([
            UserBudgetSeeder::class
        ]);
        \App\Models\Vendor::factory(5)->create();
        \App\Models\Apsipirkimas::factory($apsipirkimasFactor)->create();
        \App\Models\Prekepaslauga::factory($pirkinysFactor)->create();
        \App\Models\Pirkinys::factory($pirkinysFactor)->create();
        \App\Models\Flat::factory(50)->create();
        $this->call([FriendshipSeeder::class]);

        //------DESTYTOJUI ATGAMINTI SITUACIJA-----
         $user2  =   User::find(2);
         $user3  =   User::find(3);
         $user4  =   User::find(4);

        $role_authUser  =   Role::find(3);

        $user2->assignRole($role_authUser);
        $user3->assignRole($role_authUser);
        $user4->assignRole($role_authUser);

        $role_owner     =   Role::find(4); // ownder
        $role_editor    =   Role::find(5); // editor
        $role_viewer    =   Role::find(6); // viewer  
        
        $permission_edit_editor     =   Permission::find('budget-edit-editor');
        $permission_view_editor     =   Permission::find('budget-view-editor');
        $permission_edit_owner      =   Permission::find('budget-edit-owner');
        $permission_view_owner      =   Permission::find('budget-view-owner');
        $permission_view_viewer     =   Permission::find('budget-view-viewer');
        $permissions_owner  =  collect([$permission_edit_owner,$permission_view_owner ]);
        $permissions_editor =  collect([$permission_edit_editor,$permission_view_editor ]);
        $permissions_viewer =  collect([$permission_view_viewer]);
        $role_owner->syncPermissions($permissions_owner);
        $role_editor->syncPermissions($permissions_editor);
        $role_viewer->syncPermissions($permissions_viewer);
        $user2->assignRole($role_owner);
        $user3->assignRole($role_editor);
        $user4->assignRole($role_viewer);
}
}
