<?php

namespace App\Http\Controllers\Vue;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\HomeResource;

// use App\Http\Resources\Country\GeneralResource as CountryResource;

class DashboardController extends Controller
{
    public function home()
    {
        return new HomeResource() ;
    }
}
