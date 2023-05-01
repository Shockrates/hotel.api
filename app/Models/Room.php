<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'room';

    protected $fillable = [
        'name',
        'type_id',
        'city',
        'area',
        'photo_url',
        'count_of_guests',
        'price',
        'address',
        'location_lat',
        'location_long',
        'description_short',
        'description_long',
        'parking',
        'wifi',
        'pet_friendly'
    ];

    public function roomType(){
        return $this->belongsTo(RoomType::class, 'type_id', 'id');
    }
}
