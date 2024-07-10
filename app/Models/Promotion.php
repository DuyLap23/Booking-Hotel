<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotel_id', 
        'description',
        'discount_percentage', 
        'start_date', 
        'end_date'
    ];
}
