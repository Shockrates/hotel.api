<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'booking_id' => (string)$this->id,
            'attributes' =>[
                'user_id' => (string)$this->user->id,
                'room_id'=> (string)$this->room->id,
                'check_in_date' => $this->check_in_date,
                'check_out_date' => $this->check_out_date,
                'total_price' => $this->total_price,
            ]
        ];
    }
}
