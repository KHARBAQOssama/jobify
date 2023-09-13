<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequests\ChangeEmailRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequests\ChangePasswordRequest;
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

}
