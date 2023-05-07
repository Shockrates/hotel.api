<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'review_id' => (string)$this->id,
            'attributes' =>[
                'user_id' => (string)$this->user->name,
                'room_id'=> (string)$this->room->name,
                'rate' => $this->rate,
                'comment' => $this->comment,
            ]
        ];
    }
}
