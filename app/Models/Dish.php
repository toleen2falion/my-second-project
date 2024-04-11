<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Dish extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'type',
        'pattern',
        'country',
        'cost',
        'cookTime',
        'numberIndividual',
        'description',
        'chef_id',
        'state',
        'calories',
        'totalFat',
        'cholesterol',
        'sodium',
        'vitaminA',
        'vitaminC',
        'protein',
        'sugars',
       
    ];
    ////one to many chef dish
    public function chef(){
        return $this->belongsTo(Chef::class);
    }
    ////many to many dish_ingredients
    public function ingredients(){
        return $this->belongsToMany(ingredients::class,'dish_ingredients','dish_id','ingredient_id');
    }

    ////test
    public function Dish_ingredients(){
        return $this->hasMany(Dish_ingredients::class,'dish_id');
    } 

    ////many to many user comments
    public function users(){
        return $this->belongsToMany(User::class,'comments','dish_id','user_id');
    }

     ////test
     public function comments(){
        return $this->hasMany(Comment::class,'dish_id');
    } 
}
