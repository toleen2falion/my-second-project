<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_bloked_ingredients extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ingredient_id',
        
    ];
}
