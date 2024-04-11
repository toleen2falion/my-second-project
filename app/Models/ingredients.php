<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ingredients extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'servingSize', 'calories','totalFat','cholesterol','sodium',
        'vitaminA','vitaminC','protein','sugars',
    ];

    ////many to many dish_ingredients
    public function Dishs(){
        return $this->belongsToMany(Dish::class,'dish_ingredients','dish_id','ingredient_id');
    }
    public function Dish_ingredients(){
        return $this->hasMany(Dish_ingredients::class,'ingredient_id');
    }


    ////test سلة المشتريات
     ////many to many user_shopping list 
     public function users(){
        return $this->belongsToMany(User::class,'shopping_lists','ingredient_id','user_id');
    }

//    ////test سلة المشتريات
//     public function shopping_lists(){
//         return $this->hasMany(Shopping_list::class,'ingredient_id');
//     } 


 ////test user_bloked_ingredients 
     ////many to many user 
     public function users_bloked_ingredients(){
        return $this->belongsToMany(User::class,'User_bloked_ingredients','ingredient_id','user_id');
    }
}
