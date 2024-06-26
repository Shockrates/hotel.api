<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'relationships' => [
                'reviews' => ReviewResource::collection($this->reviews),
                'bookings' => BookingResource::collection($this->bookings),
                'favorites' => $this->favoriteRooms()->select(DB::raw('CAST(id AS CHAR) as room_id'), 'name')->get(),
               
            ]
        ];
        
    }
}
