<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';

    protected $fillable =[
        'user_id',
        'room_id',
        'check_in_date',
        'check_out_date',
        'total_price'
    ];

    public function room(): BelongsTo{
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function setTotalprice(){
        $roomPrice = $this->room->price;

        //Find final price
        $checkInDateTime = new DateTime($this->room->check_in_date);
        
        $checkOutDateTime = new DateTime($this->room->check_out_date);
        
        $totalDays = $checkOutDateTime->diff($checkInDateTime)->days;
        return $roomPrice * $totalDays;
    }
}
