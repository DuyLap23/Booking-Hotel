<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marketing_Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotel_id',
        'image_url',
        'link',
        'description',
        'start_date',
        'end_date',
    ];
}
