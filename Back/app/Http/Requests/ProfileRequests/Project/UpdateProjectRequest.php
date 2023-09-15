<?php

namespace App\Http\Requests\ProfileRequests\Project;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'name' => 'nullable|string',
            'role' => 'nullable|string',
            'current' => 'nullable|boolean',
            'from' => 'nullable|string',
            'to' => 'nullable|string|required_if:current,false',
            'description' => 'nullable|string',
            'url' => 'nullable|string',
            'work_experience_id'=>'nullable|exists:work_experiences,id',
            'education_id'=>'nullable|exists:education,id',
        ];
    }
}
