<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\CompanyController;
use App\Models\Employee;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register','reset','resetPassword']]);
    }


    public function register($request)
    {
        $credentials = $request->only(['email']);
        $credentials['password'] = Hash::make($request->input('password'));

        $user = User::create($credentials);

        return $this->login();
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['message' => 'Email or Password is incorrect'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function initializeRole()
    {
        $credentials = request(['role_id']);

        $user = JWTAuth::user();

        if($user->role_id){
            return response()->json(['action not allowed'],401);
        }

        $user->update($credentials);

        return response()->json([
            'message'=>'done',
            'role'=>$user->role_id
        ]);

    }

    public function completeProfile(){
        
        $role = JWTAuth::user()->role;
        $request = request()->all();
        $user = JWTAuth::user();

        if(!$role){
            return response()->json(['message'=>'not allowed','role'=>JWTAuth::user()],401);
        }
        if($role->name == 'employee'){
            $controller = new EmployeeController;
            $profile = $controller->createProfile($request);
            $user->profile()->associate($profile);
            $user->save();
        }else if($role->name == 'company'){
            $controller = new CompanyController;
            $company = $controller->createCompany($request);
            $user->company()->associate($company);
            $user->save();
        }else{
            return response()->json(['message'=>'not allowed','role'=>$role->name],401);
        }
        return response()->json($user);

    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json(['token'=>[
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60
            ], 
            'user'=>JWTAuth::user()
        ]);
    }

    public function resetPassword(){
        request()->validate(['email' => 'required|email|exists:users']);
        $token = Str::random(64);

        $email = request('email');

        DB::table('password_reset_tokens')->insert([
            'email' => $email, 
            'token' => $token, 
            'created_at' => Carbon::now()
        ]);

        $credentials = [
            'token' => $token,
            'email' => $email
        ];

         Mail::send('email.forgetPassword', ['credentials'=>$credentials], function($message) use($email){
             $message->to($email);
             $message->subject('Reset Password');
         });

        return response()->json(['message'=> 'check your email']);
    }
    
    public function reset(){
        request()->validate([
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_reset_tokens')
                            ->where([
                              'email' => request('email'), 
                              'token' => request('token')
                            ])
                            ->first();

        if(!$updatePassword){
            return response()->json(['error'=>'Invalid token!']);
        }

        $user = User::where('email', request('email'))
                    ->update(['password' => Hash::make(request('password'))]);

        DB::table('password_reset_tokens')->where(['email'=> request('email')])->delete();
 
        return response()->json(['message'=>'Your password has been changed!']);
    }
}