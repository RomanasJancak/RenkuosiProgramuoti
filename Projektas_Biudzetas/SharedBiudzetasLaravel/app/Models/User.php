<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Facades\DB;

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
        return $this->belongsToMany(Budget::class,'user_budgets')->withPivot('role_id');
    }
    public function friends(){
        return $this->belongsToMany(User::class,'friendships','user_id','friend_id');
    }
    public function friendshipRequests(){
        return $this->belongsToMany(User::class,'friendship_requests','user_id','friend_id');
    }
    public function friendshipRequestsTo(){
        return $this->belongsToMany(User::class,'friendship_requests','friend_id','user_id');
    }
    public function isFriend(User $user){
        if($this->friends->contains($user)){
            return true;
        }
        return false;
    }
    public function hasFriendRequest(User $user)
    {
        if($this->friendshipRequests->contains($user)){
            return true;
        }
        return false;
    }
    public function getFriendship($friend_id)
    {
        foreach(Friendship::all() as $friendship){
            if(($friendship->friend_id == $friend_id)&&($friendship->user_id == $this->id)){
                return $friendship;
            }
        }
    }
    public function getFriendshipRequest($friend_id)
    {
        //dump($friend_id);
        foreach(FriendshipRequest::all() as $friendshipRequest){
            //dump($friendshipRequest);
            if(($friendshipRequest->friend_id == $friend_id)&&($friendshipRequest->user_id == $this->id)){
                //dd('true');
                return $friendshipRequest;
            }
        }
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
    public function getPakvietimai(){
        $pakvietimai = Pakvietimas::all()->
            where('model_type_with',$this->g)->
            where('friend_id',$friendship->user_id);
    }
}
