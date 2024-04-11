<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish_ingredients extends Model
{
    use HasFactory;
    protected $fillable = [
        'dish_id',
        'ingredient_id',
        'type',
        'quantity',
        'measruingUnit',
        
       
    ];
    public function ingredients(){
        return $this->belongsTo(ingredients::class);
    }
}
