<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'dateOfBirth',
        'height',
        'weight',
        'gender',
        'phone',
        'status',
        'playSport',
        'wieghtPlanType',

    ];


     // one to one user profile
     public function user(){
        return $this->belongsTo(User::class);
    }
}
