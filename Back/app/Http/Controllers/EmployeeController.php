<?php

namespace App\Http\Controllers;

use App\Events\EmployeeCreated;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\ContactInformation;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Requests\AuthRequests\CompletProfileRequest;
use App\Http\Requests\ProfileRequests\UpdateExpectedSalaryRequest;
use App\Http\Requests\ProfileRequests\UpdateSummaryRequest;
use App\Models\ExpectedSalary;

class EmployeeController extends Controller
{
    private static $employee;

    public function __construct()
    {
        self::$employee = User::with('employee')->find(JWTAuth::user()->id)->employee;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getEmployee(){
        return self::$employee;
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
            'first_name',
            'middle_name',
            'last_name',
            'birthday',
            'summary',
            'image',
            'portfolio',
            'linkedin',
            'resume',
        );
        $contact_info = ContactInformation::where([
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
        ])->first();
        if(!$contact_info){
            $contact_info = ContactInformation::create(
                $request->only(
                    'email',
                    'phone_number',
                    'address',
                )
            );
        }
        
        $credentials['contact_information_id'] = $contact_info->id;
        $employee = Employee::create($credentials);
        event(new EmployeeCreated($employee));
        return $employee;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }

    public function updateSummary(UpdateSummaryRequest $request)
    {
        self::$employee->update(['summary'=>$request->input('summary')]);
        return "summary has been updated";
    }

    public function updateExpectedSalary(UpdateExpectedSalaryRequest $request)
    {   
        $expected_salary = self::$employee->expected_salary;
        ExpectedSalaryController::update($request, $expected_salary);
        return "expected salary has been changed";
    }
}
