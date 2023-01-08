<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pirkinys extends Model
{
    use HasFactory;
    public function apsipirkimas()
    {
        return $this->belongsTo(Apsipirkimas::class);
    }
    public function prekepaslauga()
    {
        return $this->belongsTo(Prekepaslauga::class);
    }
}
