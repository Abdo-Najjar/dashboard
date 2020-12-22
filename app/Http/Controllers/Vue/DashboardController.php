<?php

namespace App\Http\Controllers\Vue;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Resources\Country\GeneralResource as CountryResource;

class DashboardController extends Controller
{
    public function home()
    {
        return CountryResource::collection(Country::orderByDesc('updated_at')->get());
    }
}
