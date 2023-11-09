<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequests\CompletProfileRequest;
use App\Http\Requests\ProfileRequests\ChangeEmailRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequests\ChangePasswordRequest;
use App\Http\Requests\ProfileRequests\UpdateProfileRequest;
use App\Models\Employee;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = User::find(JWTAuth::user()->id);
    }

    public function changePassword(ChangePasswordRequest $request){

        if (!Hash::check($request->input('old_password'), $this->user->password)) {
            return "Password is incorrect!";
        }

        $this->user->update([
            'password'=>Hash::make($request->input('password'))
        ]);
        $this->user->save();
        return "password has been changed";

    }

    public function changeEmail(ChangeEmailRequest $request){
        if (!Hash::check($request->input('password'), $this->user->password)) {
            return "Password is incorrect!";
        }
        $this->user->update([
            'email'=>$request->input('email')
        ]);
        $this->user->save();
        return "email has been changed";
    }

    public function completeProfile(CompletProfileRequest $request){

        $user = JWTAuth::user();
        $user = User::with('role')->find($user->id);
        $role = $user->role_id;
        if(!$role){
            return response()->json(['message'=>'not allowed'],401);
        }
        if($user->employee || $user->company){
            return response()->json(['message'=>'not allowed'],401);
        }
        if($role == 2){
            $employee =  EmployeeController::store($request);
            $user->employee()->associate($employee);
            $user->save();
        }else if($role == 3){
            $company = CompanyController::store($request);
            $user->company()->associate($company);
            $user->save();
        }else{
            return response()->json(['message'=>'not allowed'],401);
        }
        return response()->json(['user'=>$user]);

    }

    public function updateProfile(UpdateProfileRequest $request){

        $user = JWTAuth::user();
        $user = User::with('role','employee','company')->find($user->id);
        $role = $user->role_id;
        if(!$role){
            return response()->json(['message'=>'not allowed'],401);
        }
        if(!$user->employee && !$user->company){
            return response()->json(['message'=>'not allowed'],401);
        }
        if($role == 2){
            EmployeeController::update($request,$user->employee);
        }else if($role == 3){
            CompanyController::update($request,$user->company);
        }else{
            return response()->json(['message'=>'not allowed'],401);
        }
        return response()->json($user);

    }
}
