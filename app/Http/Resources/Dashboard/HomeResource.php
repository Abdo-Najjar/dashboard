<?php

namespace App\Http\Resources\Dashboard;

use App\Models\City;
use App\Models\Country;
use App\Http\Resources\Country\GeneralResource as CountryResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ServiceProivder\Dashboard\ViewResource as ServiceProviderResource;
use App\Http\Resources\City\Dashboard\OrderStaticsResource;
use App\Http\Resources\City\Dashboard\UsersStaticsResource;
use App\Models\ServiceProvider;

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
            'users_statics' => UsersStaticsResource::collection($this->cities),
            'today_summary' => [
                [
                    'name'  =>   trans('common.new_order'),
                    'count' => rand(10, 30)
                ],
                [
                    'name'  =>   trans('common.order_done'),
                    'count' => rand(10, 30)
                ],
                [
                    'name'  =>   trans('common.order_underway'),
                    'count' => rand(10, 30)
                ],
                [
                    'name'  =>   trans('common.today_income'),
                    'count' => rand(10, 30)
                ],
            ],
            'orders_statuses'   => [
                [
                    'name'  =>   trans('common.new'),
                    'count' => rand(10, 30)
                ],
                [

                    'name'  =>   trans('common.underway'),
                    'count' => rand(10, 30)
                ],
                [
                    'name'  =>   trans('common.confirmed'),
                    'count' => rand(10, 30)
                ],
                [
                    'name'  =>   trans('common.completed'),
                    'count' => rand(10, 30)
                ],
                [
                    'name'  =>   trans('common.canceled'),
                    'count' => rand(10, 30)
                ],
            ]
        ];
    }
}
