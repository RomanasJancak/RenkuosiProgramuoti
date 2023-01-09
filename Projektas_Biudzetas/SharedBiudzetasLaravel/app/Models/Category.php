<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function childs()
    {
        return $this->hasMany(Category::class,'parent_id');
    }
    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }
    public function createWithFake($number){
        for($i = 0;$i < $number;$i++){
            $kategorija = new Category;
            $tevas = Category::all()->random();           
            $kategorija->parent_id = $tevas->id;
            $kategorija->name = $tevas->name.' '.$i;
            $kategorija->save();
        }
    }
}