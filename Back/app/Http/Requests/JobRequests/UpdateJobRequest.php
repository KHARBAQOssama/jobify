<?php

namespace App\Http\Requests\JobRequests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobRequest extends FormRequest
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
            'title'                 => 'nullable|string|max:255',
            'description'           => 'nullable|string',
            'qualifications'        => 'nullable|json',
            'benefits'              => 'nullable|array',
            'benefits.*'            => 'string',
            'minimum_salary'        => 'nullable|integer|min:0',
            'maximum_salary'        => 'nullable|integer|min:0|gte:minimum_salary',
            'frequency'             => 'nullable|string|max:255',
            'currency'              => 'nullable|string|max:255',
            'applying_capacity'     => 'nullable|integer|min:0',
            'location_id'           => 'nullable|exists:locations,id',
            'job_level_id'          => 'nullable|exists:job_levels,id', 
            'category_id'           => 'nullable|exists:categories,id', 
            'employment_type_id'    => 'nullable|exists:employment_types,id',
            'new_category'          => 'nullable|string'
        ];
    }
}
