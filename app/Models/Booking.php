<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';

    protected $fillable =[
        'user_id',
        'room_id',
        'check_in_date',
        'check_out_date'
    ];

    public function room(){
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

    public function user(){
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
