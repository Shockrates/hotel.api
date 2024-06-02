<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;

    protected $table = 'room';
    protected $hidden = ['pivot'];

    protected $casts = [
        'location_lat' => 'float',
        'location_long' => 'float'
    ];

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

    public function users()
    {
        return $this->belongsToMany(User::class, 'favorite', 'room_id', 'user_id');
    }


    public function isNotBooked($check_in_date, $check_out_date){
        return empty(
                $this->bookings()->where(
                    [
                        ['check_in_date', '<=', $check_out_date],
                        ['check_out_date', '>=' ,$check_in_date]
                    ]
                )
                ->get()
                ->toArray()
            );
    }



}
