<?php

namespace App\Http\Controllers\Vue;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\HomeResource;

class DashboardController extends Controller
{
    public function home()
    {
        return new HomeResource() ;
    }
}
