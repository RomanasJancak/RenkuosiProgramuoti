<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Budget;
use App\Models\User;

use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function budgets()
    {
        return $this->belongsToMany(Budget::class,'user_budgets');
    }
    /**
     * Patikrina ar perduodamo modelio bent viena role yra žemiau bent vienos vartotojos esamo modelio
     */
    public function isRoleBelow($childUser){
        $p_roles    =   $this->roles;
        $c_roles    =   $childUser->roles;
        foreach($p_roles as $p_role){
            foreach($c_roles as $c_role){
                while($c_role->parent != null){
                    if($c_role->parent->name == $p_role->name){
                        return true;
                    }
                    $c_role =   $c_role->parent;
                }
            }
        }
        return false;
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
