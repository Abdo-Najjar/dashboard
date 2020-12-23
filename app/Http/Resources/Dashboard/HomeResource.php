<?php

namespace App\Http\Resources\Dashboard;

use App\City;
use App\Country;
use App\Http\Resources\Country\GeneralResource as CountryResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ServiceProivder\Dashboard\ViewResource as ServiceProviderResource;
use App\Http\Resources\City\Dashboard\OrderStaticsResource;
use App\Http\Resources\City\Dashboard\UsersStaticsResource;
use App\ServiceProvider;

class HomeResource extends JsonResource
{
    private $cities;
    public function __construct()
    {
        $this->cities = City::inRandomOrder()->take(rand(2, 8))->get();
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
            ],
            'service_providers' => [
                'best_service_providers'      => ServiceProviderResource::collection(ServiceProvider::inRandomOrder()->take(3)->get()),
                'best_earn_service_providers' => ServiceProviderResource::collection(ServiceProvider::inRandomOrder()->skip(3)->take(3)->get()),
            ],

            'order_statics' => OrderStaticsResource::collection($this->cities),
            'users_statics' => UsersStaticsResource::collection($this->cities)
        ];
    }
}
