<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Apsipirkimas extends Model
{
    use HasFactory;
    public function budget()
    {
        return $this->belongsTo(Budget::class);
    }
    public function pirkiniai()
    {
        return $this->hasMany(Pirkinys::class);
    }
    public function vendor()
    {
        return $this->belongsTO(Vendor::class);
    }
}
