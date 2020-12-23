<?php

namespace App\Http\Resources\City\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderStaticsResource extends JsonResource
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
            'city_name'             => $this->name,
            'orders_number'         => rand(100, 241),
            'total_income'          => rand(10000, 17878)
        ];
    }
}
