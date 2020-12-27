<?php

namespace App\Http\Controllers\Vue;

use App\Http\Controllers\Controller;
use App\Http\Requests\City\ValidateRequest;
use App\Models\City;

class CityController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  ValidateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateRequest $request)
    {
        City::create($request->validated());

        return response()->json(['message' => trans('common.created')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ValidateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateRequest $request, $id)
    {
        //
    }
}
