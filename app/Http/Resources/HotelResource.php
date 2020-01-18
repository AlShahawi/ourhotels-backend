<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Hotels\Hotel */
class HotelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'provider' => $this->getProvider(),
            'hotelName' => $this->getName(),
            'fare' => $this->getFare(),
            'amenities' => $this->getAmenities(),
        ];
    }
}
