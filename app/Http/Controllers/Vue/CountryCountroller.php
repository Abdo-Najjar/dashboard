<?php

namespace App\Http\Controllers\Vue;

use App\Models\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Country\GeneralResource as CountryResource;
use App\Http\Resources\City\GeneralResource as CityResource;
use App\Http\Requests\Country\ValidateRequest;

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
     * @param ValidateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateRequest $request)
    {
        Country::create($request->validated());

        return response()->json(['message' => trans('common.created')]);
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
