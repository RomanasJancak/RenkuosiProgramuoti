<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //
         $user = User::create([
            'name' => 'SAdmin',
            'email' => 'SAdmin@localhost.lt',
            'password' => Hash::make('password')
         ]);

         $role = Role::find(1);
         
         $permission = Permission::pluck('id','id')->all();
         $role->syncPermissions($permission);
         $user->assignRole($role->id);
         //sideti teises ir roles i rysio lenetel
         // prie roles SAdmin priskirti visas teises ir role priskirti prie sio konkretaus vartotojo
    }
}
