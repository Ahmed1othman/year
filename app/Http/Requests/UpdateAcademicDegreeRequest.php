<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAcademicDegreeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {
        return [
            'Degree_start_date'=>'nullable|data',
            'Degree_end_date'=>'nullable|data',
            'Degree_active_date'=>'nullable|data',
            'degree_successful_transfer_date'=>'nullable|data',
            'Degree_hijri_start_date'=>'nullable|string',
            'Degree_hijri_end_date'=>'nullable|string',
            'academic_year_id'=>'nullable|string|max:255|exists:academic_years,id',
            'academic_gender_id'=>'nullable|string|max:255|exists:academic_genders,id',
            'academic_degree_id'=>'nullable|string|max:255|exists:academic_degrees,id',
            'degree_id'=>'nullable|string|max:255|exists:classes,id',
            'class_active_date'=>'nullable|date',
            'max_capacity'=>'nullable|numeric',
            'min_capacity'=>'nullable|numeric',
        ];
    }



    protected function prepareForValidation()
    {
        $this->merge([
            'active' => (bool) $this->active,
            'is_open_for_admission' => (bool) $this->is_open_for_admission,
        ]);
    }
}
