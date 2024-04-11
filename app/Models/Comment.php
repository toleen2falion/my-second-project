<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'dish_id',
        'user_id',
        'content',
       
    ];

    // public function users(){
    //     return $this->belongsTo(users::class);
    // }
}
