<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping_list extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ingredient_id',
        'quantity',
        'measruingUnit',
        
       
    ];

    // // ////test سلة المشتريات
    // public function ingredients(){
    //     return $this->belongsTo(ingredients::class);
    // } 
    // // ////test سلة المشتريات
    // للحصول على اسم المكون
    public function ingredients()
    {
    return $this->belongsTo(ingredients::class,'ingredient_id');
    }
}
