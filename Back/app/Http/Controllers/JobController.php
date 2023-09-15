<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequests\CreateJobRequest;
use App\Http\Requests\JobRequests\UpdateJobRequest;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::with(
                    'job_level',
                    'employment_type',
                    'category',
                    'location',
                )->get();
    return response()->json(['jobs'=>$jobs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateJobRequest $request)
    {
        $data = $request->request->all();
        $data = $request->all();
        $credentials = array_filter($data, function($value) {
            return $value !== null;
        });
        $category = null;
        if($request->input('new_category')){
            $category = Category::create(['name'=>$request->input('new_category')]);
            $credentials['category_id'] = $category->id;
        }else{
            $credentials['category_id'] = $request->input('category_id');
        }
        $controller = new CompanyController;
        $credentials['company_id'] = $controller->getCompany()->id;
        $job = Job::create($credentials);
        return $job;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        $data = $request->request->all();
        $data = $request->all();
        $credentials = array_filter($data, function($value) {
            return $value !== null;
        });
        $category = null;
        if($request->input('new_category')){
            $category = Category::create(['name'=>$request->input('new_category')]);
            $credentials['category_id'] = $category->id;
        }else if($request->input('category_id')){
            $credentials['category_id'] = $request->input('category_id');
        }
        $job->update($credentials);
        $job->save();
        return $job;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return "deleted";
    }
}
