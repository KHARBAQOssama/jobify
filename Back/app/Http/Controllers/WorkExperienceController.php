<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequests\WorkExperience\CreateRequest;
use App\Http\Requests\ProfileRequests\WorkExperience\CreateWorkExperienceRequest;
use App\Http\Requests\ProfileRequests\WorkExperience\UpdateWorkExperienceRequest;
use App\Models\WorkExperience;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  null;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateWorkExperienceRequest $request)
    {
        $data = $request->request->all();
        $data = $request->all();
        $credentials = array_filter($data, function($value) {
            return $value !== null;
        });
        $employeeController = new EmployeeController;
        $credentials['employee_id'] = $employeeController->getEmployee()->id;
        $workExperience = WorkExperience::create($credentials);
        $workExperience = WorkExperience::with('employee')->find($workExperience->id);
        return response(['workExperience'=> $workExperience]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkExperience  $workExperience
     * @return \Illuminate\Http\Response
     */
    public function show(WorkExperience $workExperience)
    {
        return null;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkExperience  $workExperience
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkExperienceRequest $request, WorkExperience $workExperience)
    {
        $data = $request->request->all();
        $data = $request->all();
        $credentials = array_filter($data, function($value) {
            return $value !== null;
        });
        $workExperience->update($credentials);
        $workExperience->save;
        return response(['data'=>'up']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkExperience  $workExperience
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkExperience $workExperience)
    {
        $workExperience->delete();
        return response(["message"=>"deleted successfully"]);
    }

}
