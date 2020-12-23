<?php

namespace App\Http\Resources\Dashboard;

use App\Country;
use App\Http\Resources\Country\GeneralResource as CountryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeResource extends JsonResource
{
    public function __construct()
    {
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'countries'     =>  CountryResource::collection(Country::orderByDesc('updated_at')->get()),
            'cards'         => [
                'total_income' => rand(1000, 2000),
                'total_month_income' => rand(1000, 2000),
                'total_service_providers' => rand(1000, 2000),
                'total_customers' => rand(1000, 2000),
                'total_orders' => rand(1000, 2000),
                'total_month_orders' => rand(1000, 2000),
                'close_orders' => rand(1000, 2000),
                'open_orders' => rand(1000, 2000),
            ]
        ];
    }
}
