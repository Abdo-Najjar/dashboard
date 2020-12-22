<?php

namespace App\Http\Controllers\Vue;

use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Country\GeneralResource as CountryResource;
use App\Http\Resources\City\GeneralResource as CityResource;

class CountryCountroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CountryResource::collection(
            Country::orderByDesc('updated_at')->get()
        );     
    }

    public function cities(Country $country)
    {
        return CityResource::collection(
                $country->cities()->orderByDesc('updated_at')->get()
        );     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
