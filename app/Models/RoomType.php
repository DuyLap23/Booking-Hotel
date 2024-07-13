<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'is_active'];
    protected $casts = [
        'is_active' => 'boolean',
        
    ];
   
    function rooms()
    {
        return $this->hasMany(Room::class);
    }
    public function promotions()
    {
        return $this->belongsToMany(Promotion::class, 'room_type_promotions');
    }
}
