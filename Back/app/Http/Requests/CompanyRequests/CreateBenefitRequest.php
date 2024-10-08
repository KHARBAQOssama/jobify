<?php

namespace App\Http\Requests\CompanyRequests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBenefitRequest extends FormRequest
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
            'svg'           => 'nullable|string',
            'title'         => 'required|string',
            'description'   => 'required|string',
        ];
    }
}
