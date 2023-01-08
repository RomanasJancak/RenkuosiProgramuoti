<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prekepaslauga extends Model
{
    use HasFactory;
    public function pirkiniai()
    {
        return $this->hasMany(Pirkinys::class);
    }
}
