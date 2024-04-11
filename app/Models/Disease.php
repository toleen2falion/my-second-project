<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'created_by',
       
    ];

     ////many to many dieases and ingredients
     public function ingredients(){
        return $this->belongsToMany(ingredients::class,'dieases_bloked_ingredients','disease_id','ingredient_id');
    }


    ////test user dieases
     ////many to many user 
     public function users(){
        return $this->belongsToMany(User::class,'User_diseases','disease_id','user_id');
    }
}
