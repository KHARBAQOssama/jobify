<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\AuthRequests\InitializeRoleRequest;
use App\Http\Requests\AuthRequests\RegistrationRequest;

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


    public function register(RegistrationRequest $request)
    {
        $credentials = $request->only(['email']);
        $credentials['password'] = Hash::make($request->input('password'));

        User::create($credentials);

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

    public function initializeRole(InitializeRoleRequest $request)
    {
        $role = $request->input('role');
        $user = JWTAuth::user();
        if(($role != 2 && $role !=3 ) || $user->role){
            return response()->json(['message'=>'invalid role'],400);
        }

        $user->role()->associate($role);
        $user = $user->save();

        return response()->json([
            'message'=>'done',
            'user' => User::with('role')->find(JWTAuth::user()->id)
        ], 200);

    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(['user'=>User::with('role','company','employee')->find(auth()->user()->id)]);
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
