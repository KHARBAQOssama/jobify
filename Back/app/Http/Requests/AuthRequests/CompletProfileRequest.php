<?php

namespace App\Http\Requests\AuthRequests;

use Illuminate\Foundation\Http\FormRequest;
use Tymon\JWTAuth\Facades\JWTAuth;

class CompletProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $user = JWTAuth::user();

        // $commonRules = [
        //     'phone_number' => 'nullable|string', 
        //     'facebook' => 'nullable|string|url', 
        //     'twitter' => 'nullable|string|url', 
        //     'linkedin' => 'nullable|string|url', 
        //     'image' => 'required|string', 
        // ];

        if ($user->role_id == 3) {
            // return array_merge($commonRules, [
            //     'name' => 'required|string',
            //     'email' => 'nullable|email|unique:users,email',
            //     'foundation_date' => 'required|date',
            //     'description' => 'nullable|string',
            //     'website' => 'required|url',
            //     'company_size_id' => 'required|exists:company_sizes,id',
            //     'industry_id' => 'nullable|exists:industries,id',
            // ]);
            return [
                'name' => 'required|string',
                'foundation_date' => 'required|date',
                'industry_id' => 'nullable|exists:industries,id',
            ];
        } elseif ($user->role_id == 2) {
            // return array_merge($commonRules, [
            //     'first_name' => 'required|string',
            //     'middle_name' => 'nullable|string',
            //     'last_name' => 'nullable|string',
            //     'birthday' => 'required|date',
            //     'summary' => 'nullable|string',
            //     'portfolio' => 'nullable|string|url',
            //     'resume' => 'nullable|string',
            //     'address'=>'nullable|string',
            //     'email'=>'nullable|string',
            //     'phone_number'=>'nullable|string',
            // ]);
            return [
                'first_name' => 'required|string',
                'middle_name' => 'nullable|string',
                'last_name' => 'nullable|string',
                'birthday' => 'required|date',
                'occupation' => 'required|string'
            ];
        }
        return [];
    }
}
