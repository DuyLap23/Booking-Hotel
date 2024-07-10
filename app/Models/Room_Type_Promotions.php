<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_Type_Promotions extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_type_id',
        'promotion_id',
    ];

}
