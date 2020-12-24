<?php

namespace App\Http\Controllers\Vue;

use App\Http\Controllers\Controller;
use App\Http\Resources\Address\LocationResource;
use App\Address;

class AddressController extends Controller
{
    public function index()
    {
        return LocationResource::collection(Address::get());        
    }
}
