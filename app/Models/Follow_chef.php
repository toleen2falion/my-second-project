<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow_chef extends Model
{
    use HasFactory;
    protected $fillable = [
        'chef_id',
        'user_id',
       
    ];
}
