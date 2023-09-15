<?php

namespace App\Http\Requests\ProfileRequests\WorkExperience;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkExperienceRequest extends FormRequest
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
            'job_title' => 'nullable|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'current' => 'nullable|boolean',
            'from' => 'nullable|string',
            'to' => 'nullable|string|required_if:current,false',  
            'description' => 'nullable|string',
            'company_id' => 'nullable|exists:companies,id',
        ];
    }
}
