<?php

namespace App\Http\Requests\CompanyRequests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeamMemberRequest extends FormRequest
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
        return [
            'full_name'     => 'nullable|string',
            'image'         => 'nullable|string',
            'post'          => 'nullable|String',
            'instagram'     => 'nullable|String',
            'linkedin'      => 'nullable|String',
            'facebook'      => 'nullable|String',
            'twitter'       => 'nullable|String',
        ];
    }
}
