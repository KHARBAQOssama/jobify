<?php

namespace App\Http\Requests\ProfileRequests;

use Illuminate\Foundation\Http\FormRequest;
use Tymon\JWTAuth\Facades\JWTAuth;

class UpdateProfileRequest extends FormRequest
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

        $commonRules = [
            'phone_number'  => 'nullable|string', 
            'facebook'      => 'nullable|string|url', 
            'twitter'       => 'nullable|string|url', 
            'linkedin'      => 'nullable|string|url', 
            'image'         => 'nullable|string', 
        ];

        if ($user->role_id == 3) {
            return array_merge($commonRules, [
                'name'              => 'nullable|string',
                'email'             => 'nullable|email|unique:users,email',
                'foundation_date'   => 'nullable|date',
                'description'       => 'nullable|string',
                'website'           => 'nullable|url',
                'company_size_id'   => 'nullable|exists:company_sizes,id',
                'industry_id'       => 'nullable|exists:industries,id',
            ]);
        } elseif ($user->role_id == 2) {
            return array_merge($commonRules, [
                'first_name'    => 'nullable|string',
                'middle_name'   => 'nullable|string',
                'last_name'     => 'nullable|string',
                'birthday'      => 'nullable|date',
                'summary'       => 'nullable|string',
                'portfolio'     => 'nullable|string|url',
                'resume'        => 'nullable|string',
                'address'       => 'nullable|string',
                'email'         => 'nullable|string',
                'phone_number'  => 'nullable|string',
            ]);
        }
        return [];
    }
}
