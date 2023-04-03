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
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getroute()
    {
        if($this->category->parent == null){
            return $this->category->name;
        }elseif($this->category->parent->parent == null){
            return $this->category->parent->name.
                ' -> '.$this->category->name;
        }elseif($this->category->parent->parent->parent == null){
            return $this->category->parent->parent->name.
            ' -> '.$this->category->parent->name.
            ' -> '.$this->category->name;
        }elseif($this->category->parent->parent->parent->parent == null){
            return $this->category->parent->parent->parent->name.
            ' -> '.$this->category->parent->parent->name.
            ' -> '.$this->category->parent->name.
            ' -> '.$this->category->name; 
        }elseif($this->category->parent->parent->parent->parent->parent == null){
            return $this->category->parent->parent->parent->parent->name.
            ' -> '.$this->category->parent->parent->parent->name.
            ' -> '.$this->category->parent->parent->name.
            ' -> '.$this->category->parent->name.
            ' -> '.$this->category->name;         
        }elseif($this->category->parent->parent->parent->parent->parent->parent == null){
            return $this->category->parent->parent->parent->parent->parent->name.
            ' -> '.$this->category->parent->parent->parent->parent->name.
            ' -> '.$this->category->parent->parent->parent->name.
            ' -> '.$this->category->parent->parent->name.
            ' -> '.$this->category->parent->name.
            ' -> '.$this->category->name;         
        }elseif($this->category->parent->parent->parent->parent->parent->parent->parent == null){
            return $this->category->parent->parent->parent->parent->parent->parent->name.
            ' -> '.$this->category->parent->parent->parent->parent->parent->name.
            ' -> '.$this->category->parent->parent->parent->parent->name.
            ' -> '.$this->category->parent->parent->parent->name.
            ' -> '.$this->category->parent->parent->name.
            ' -> '.$this->category->parent->name.
            ' -> '.$this->category->name;         
        }else{
            return $this->category->parent->parent->parent->parent->parent->parent->parent->name.
            ' -> '.$this->category->parent->parent->parent->parent->parent->parent->name.
            ' -> '.$this->category->parent->parent->parent->parent->parent->name.
            ' -> '.$this->category->parent->parent->parent->parent->name.
            ' -> '.$this->category->parent->parent->parent->name.
            ' -> '.$this->category->parent->parent->name.
            ' -> '.$this->category->parent->name.
            ' -> '.$this->category->name;         
        }


    }
}
