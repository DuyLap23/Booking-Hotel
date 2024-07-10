<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'sku',
        'address',
        'city',
        'state',
        'email',
        'phone',
        'image_thumbnail',
        'description',
        'is_active',
    
    ];
}
