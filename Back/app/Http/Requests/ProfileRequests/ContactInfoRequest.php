<?php

namespace App\Http\Requests\ProfileRequests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Tymon\JWTAuth\Facades\JWTAuth;

class ContactInfoRequest extends FormRequest
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
        $contact_id = User::with('employee.contact_information')
                ->find(JWTAuth::user()->id)
                ->employee->contact_information->id;
        return [
            'email' =>[
                'nullable',
                'string',
                Rule::unique('users', 'email')->ignore(JWTAuth::user()->id),
                Rule::unique('contact_information', 'email')->ignore($contact_id), // Assuming your user model is named 'User'
            ],
            'phone_number'=>'nullable|String',
            'address'=>'nullable|String',
        ];
    }
}
