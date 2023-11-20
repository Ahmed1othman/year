<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAcademicSemesterRequest extends FormRequest
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
            'semester_name_noor'=>'required|string|max:255',
            'semester_name'=>'nullable|string|max:255',
            'semester_name_latin'=>'nullable|string|max:255',
            'semester_start_date'=>'nullable|data',
            'semester_end_date'=>'nullable|data',
            'semester_active_date'=>'nullable|data',
            'semester_successful_transfer_date'=>'nullable|data',
            'semester_hijri_start_date'=>'nullable|string',
            'semester_hijri_end_date'=>'nullable|string',
            'academic_year_id'=>'nullable|string|max:255|exists:academic_years,id',
            'academic_degree_id'=>'nullable|string|max:255|exists:academic_degrees,id',
            'semester_id'=>'nullable|string|max:255|exists:semesters,id',
            'max_capacity'=>'nullable|numeric',
            'min_capacity'=>'nullable|numeric',
        ];
    }



    protected function prepareForValidation()
    {
        $this->merge([
            'active' => (bool) $this->active,
        ]);
    }
}
