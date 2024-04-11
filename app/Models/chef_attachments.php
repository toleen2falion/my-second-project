<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chef_attachments extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_name', 'chef_name', 'Created_by','chef_id',
    ];
}
