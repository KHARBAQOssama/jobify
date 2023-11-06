<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequests\CompletProfileRequest;
use App\Http\Requests\ProfileRequests\UpdateProfileRequest;
use App\Models\Company;
use App\Models\Industry;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class CompanyController extends Controller
{
    private static $company;

    public function __construct()
    {
        self::$company = User::with('company')->find(JWTAuth::user()->id)->company;
    }

    public static function getCompany(){
        return self::$company;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::with([
                'locations',
                'team_members',
                'jobs' => function ($query) {
                    $query->with([
                        'job_level',
                        'employment_type',
                        'category',
                        'location',
                    ]);
                },
            ])->get();
        return response()->json(['companies'=>$companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store(CompletProfileRequest $request)
    {
        $credentials = $request->only(
            'name',
            'email',
            'description',
            'phone_number',
            'foundation_date',
            'image',
            'website',
            'facebook',
            'twitter',
            'linkedin',
            'company_size_id',
        );

        $industry = null;
        if($request->input('new_industry')){
            $industry = Industry::create(['name'=>$request->input('new_industry')]);
            $credentials['industry_id'] = $industry->id;
        }else{
            $credentials['industry_id'] = $request->input('industry_id');
        }

        return Company::create($credentials);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public static function update(UpdateProfileRequest $request, Company $company)
    {
        $data = $request->request->all();
        $data = $request->all();
        $credentials = array_filter($data, function($value) {
            return $value !== null;
        });
        if($request->input('new_industry')){
            $industry = Industry::create(['name'=>$request->input('new_industry')]);
            $credentials['industry_id'] = $industry->id;
        }else if($request->input('industry_id')){
            $credentials['industry_id'] = $request->input('industry_id');
        }

        $company->update($credentials);
        $company->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
