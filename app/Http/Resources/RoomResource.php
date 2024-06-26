<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return [
            'id' => (string)$this->id,
            'attributes' =>[
                'name' => $this->name,
                'type' => $this->roomType->title,
                'city' => $this->city,
                'area' => $this->area,
                'photo_url' => $this->photo_url,
                'count_of_guests' => $this->count_of_guests,
                'price' => $this->price,
                'address'=> $this->address,
                'location_lat' => $this->location_lat,
                'location_long'=> $this->location_long,
                'description_short' => $this->description_short,
                'description_long'=> $this->description_long,
                'parking'=> $this->parking,
                'wifi' => $this->wifi,
                'pet_friendly' => $this->pet_friendly,
                'avg_reviews' => $this->avg_reviews, 
                'count_reviews'=> $this->count_reviews,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,

            ],
            'relationships' => [
                'roomType' => $this->roomType,
                
                'reviews' => ReviewResource::collection($this->reviews),
                'favorite_total' => $this->users->count(),
                //'bookings' => BookingResource::collection($this->bookings),
            ]
        
        ];
    }
}
