<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Budget;
use App\Models\User;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

//class Budget extends Model
class Budget extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsToMany(User::class,'user_budgets');
    }
}
