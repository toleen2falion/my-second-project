<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dieases_bloked_ingredient extends Model
{
    use HasFactory;
    protected $fillable = [
        'disease_id',
        'ingredient_id',
       
    ];
}
