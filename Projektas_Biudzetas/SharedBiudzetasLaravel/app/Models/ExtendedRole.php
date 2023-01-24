<?php

namespace App\Models;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtendedRole extends Role
{
    public function test()
    {
        return "this";
    }
}