<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends SpatieRole
{
    public function childs()
    {
        return $this->hasMany(Role::class,'parent_id');
    }
    public function parent()
    {
        return $this->belongsTo(Role::class,'parent_id');
    }
    public function isRoleBelow($role)
    {
        $c_role = $role;
        while($c_role->parent != null){
            if($c_role->parent->name == $this->name){
                return true;
            }
            $c_role =   $c_role->parent;
        }
    }
    public function console_log($output, $with_script_tags = true) {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
       ');';
       if ($with_script_tags) {
       $js_code = '<script>' . $js_code . '</script>';
       }
       echo $js_code;
       }
}