<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'pet_friendly',
        'avg_reviews', 
        'count_reviews',
    ];

    public function roomType(){
        return $this->belongsTo(RoomType::class, 'type_id', 'id');
    }


    /**
     * Get the bookings for this room.
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class, 'room_id');
    }

    /**
     * Get the reviews for this room.
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'room_id');
    }

    public function favoriteRooms()
    {
        return $this->belongstoMany(Room::class);
    }



}
