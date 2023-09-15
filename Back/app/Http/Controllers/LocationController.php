<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequests\UpdateLocationRequest;
use App\Models\Company;
use App\Models\Language;
use App\Models\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateLocationRequest $request)
    {
        $data = $request->request->all();
        $data = $request->all();
        $credentials = array_filter($data, function($value) {
            return $value !== null;
        });
        $controller = new CompanyController;
        $credentials['company_id'] = $controller->getCompany()->id;
        $location = Location::create($credentials);
        return $location;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLocationRequest $request, Location $location)
    {
        $data = $request->request->all();
        $data = $request->all();
        $credentials = array_filter($data, function($value) {
            return $value !== null;
        });

        $location->update($credentials);
        $location->save();
        return $location;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        //
    }
}
