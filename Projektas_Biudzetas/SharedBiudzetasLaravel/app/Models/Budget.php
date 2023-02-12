<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

//class Budget extends Model
class Budget extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsToMany(User::class,'user_budgets')->withPivot('role_id');
    }
    public function addUser()
    {

    }
    public function getOwner(){
        foreach($this->users as $user){

        }
    }
    public function apsipirkimai()
    {
        return $this->hasMany(Apsipirkimas::class);
    }
    public function expences_lastMonth(){
        $curmonth   = date('m')-1;
        $curyear    = date('Y');
        if($curmonth == 0){
            $curmonth   = 12;
            $curyear    -= 1; 
        }
        $suma = 0;
        foreach($this->apsipirkimai as $apsipirkimas){
            $timestamp  =   strtotime($apsipirkimas->shop_time);
            $date       =   getdate($timestamp);
            $apmonth    =   date('m',$timestamp);
            $apyear     =   date('Y',$timestamp);
            if(($curmonth == $apmonth)&&($curyear == $apyear)){
                //dd($apsipirkimas->suma);
                $suma+=$apsipirkimas->suma;
                
            }
        }
        //dd($suma);
        return $suma;}
    public function expences_lastMonth_text(){
            $suma = $this->expences_lastMonth();
            $sumatext = (($suma-($suma % 100))/100).".".$suma % 100;
        return $sumatext;}     
    public function expences_thisMonth(){
        $curmonth   = date('m');
        $curyear    = date('Y');
        
        $suma = 0;
        foreach($this->apsipirkimai as $apsipirkimas){
            $timestamp  =   strtotime($apsipirkimas->shop_time);
            $date       =   getdate($timestamp);
            $apmonth    =   date('m',$timestamp);
            $apyear     =   date('Y',$timestamp);
            if(($curmonth == $apmonth)&&($curyear == $apyear)){
                //dd($apsipirkimas->suma);
                $suma+=$apsipirkimas->suma;
                
            }
        }
        //dd($suma);
        return $suma;}
    public function expences_thisMonth_text(){
        $suma = $this->expences_thisMonth();
        $sumatext = (($suma-($suma % 100))/100).".".$suma % 100;
        return $sumatext;}            
    public function expenses_total(){        
        $suma = 0;
        foreach($this->apsipirkimai as $apsipirkimas)
            {
                $suma+=$apsipirkimas->suma;      
            }
        return $suma;}
    public function expenses_total_text(){
        $suma = $this->expenses_total();
        $sumatext = (($suma-($suma % 100))/100).".".$suma % 100;
        return $sumatext;}
    public function get_Owner(){
        //App\Models\Role::find($useris->pivot->role_id)->name
        foreach($this->users as $user)
        {
            if(Role::find($user->pivot->role_id)->name == 'budget_owner'){
                return $user;
            }                           
        }}
    public function get_currentUser_role(){
        $roleName = "";
        foreach($this->users as $user)
        {
            if(auth()->user()->id == $user->id){
                return Role::find($user->pivot->role_id)->name;
            }
        }   
    }
}
