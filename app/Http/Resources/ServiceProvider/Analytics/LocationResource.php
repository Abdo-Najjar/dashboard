<?php

namespace App\Http\Resources\ServiceProvider\Analytics;

use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
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
            'longitude' => $this->longitude,
            'latitude'   => $this->latitude,
            'icon'      => '/markers/marker2.png'
        ];
    }
}
