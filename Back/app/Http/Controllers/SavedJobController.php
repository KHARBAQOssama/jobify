<?php

namespace App\Http\Controllers;

use App\Models\SavedJob;
use Illuminate\Http\Request;
use Illuminate\Support\Js;

class SavedJobController extends Controller
{
    public function index()
    {   
        $employeeController = new EmployeeController;
        $employeeId = $employeeController->getEmployee()->id;
        $savedJobs = SavedJob::with('job')->where('employee_id',$employeeId)->get();
        return response()->json(['savedJobs'=>$savedJobs]);
    }

    public function store(Request $request)
    {
        $jobId = $request->input('job_id');
        $credentials['job_id'] = $jobId;
        $employeeController = new EmployeeController;
        $employeeId = $employeeController->getEmployee()->id;
        $credentials['employee_id'] = $employeeId;
        $savedJob = SavedJob::where('employee_id',$employeeId)
                            ->where('job_id',$jobId)
                            ->first();
        if($savedJob){
            SavedJob::find($savedJob->id)->delete();
            return "removed";
        }else{
            $saved_job = SavedJob::create($credentials);
            return $saved_job;
        }
        
    }
}
