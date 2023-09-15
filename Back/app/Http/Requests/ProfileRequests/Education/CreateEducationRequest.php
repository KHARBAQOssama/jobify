<?php

namespace App\Http\Requests\ProfileRequests\Education;

use Illuminate\Foundation\Http\FormRequest;

class CreateEducationRequest extends FormRequest
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
            'course' => 'required|string',
            'school' => 'required|string',
            'graduated' => 'required|boolean',
            'from' => 'required|string',
            'to' => 'nullable|string|required_if:current,true',
            'description' => 'nullable|string',
            'media' => 'nullable|string',
            'education_attainment_id' => 'required|exists:education_attainments,id',
        ];
    }
}
