<?php

namespace App\Http\Controllers;

use App\Models\ExpectedSalary;
use Illuminate\Http\Request;

class ExpectedSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\ExpectedSalary  $expectedSalary
     * @return \Illuminate\Http\Response
     */
    public function show(ExpectedSalary $expectedSalary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExpectedSalary  $expectedSalary
     * @return \Illuminate\Http\Response
     */
    public static function update( $request, ExpectedSalary $expectedSalary)
    {
        $data = $request->request->all();
        $data = $request->all();
        $credentials = array_filter($data, function($value) {
            return $value !== null;
        });

        $expectedSalary->update($credentials);
        $expectedSalary->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpectedSalary  $expectedSalary
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpectedSalary $expectedSalary)
    {
        
    }
}
