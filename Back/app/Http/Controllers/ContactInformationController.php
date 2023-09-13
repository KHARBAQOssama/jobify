<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequests\ContactInfoRequest;
use App\Models\ContactInformation;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ContactInformationController extends Controller
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
     * @param  \App\Models\ContactInformation  $contactInformation
     * @return \Illuminate\Http\Response
     */
    public function show(ContactInformation $contactInformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactInformation  $contactInformation
     * @return \Illuminate\Http\Response
     */
    public function update(ContactInfoRequest $request, ContactInformation $contactInformation)
    {   
        $data = $request->request->all();
        $data = $request->all();
        $credentials = array_filter($data, function($value) {
            return $value !== null;
        });
        // $inputs = $request->input();
        // $credentials = [
        //     'email'=>$inputs['email'],
        //     'address'=>$inputs['address'],
        //     'phone_number'=>$inputs['phone_number'],
        // ];
        $contactInformation->update(
            $credentials
        );
        $contactInformation->save();
        return $contactInformation;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactInformation  $contactInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactInformation $contactInformation)
    {
        //
    }
}
