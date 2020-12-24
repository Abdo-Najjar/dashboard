<?php

namespace App\Http\Controllers\Vue;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceProvider\Analytics\LocationResource;
use App\ServiceProvider;

class ServiceProviderController extends Controller
{
    public function index()
    {
        return  LocationResource::collection(ServiceProvider::get());
    }
}
