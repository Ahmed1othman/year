<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAcademicTermRequest extends FormRequest
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
            'term_name_noor'=>'required|string|max:255',
            'term_name'=>'nullable|string|max:255',
            'term_name_latin'=>'nullable|string|max:255',
            'term_start_date'=>'nullable|data',
            'term_end_date'=>'nullable|data',
            'term_active_date'=>'nullable|data',
            'term_successful_transfer_date'=>'nullable|data',
            'term_hijri_start_date'=>'nullable|string',
            'term_hijri_end_date'=>'nullable|string',
            'academic_year_id'=>'nullable|string|max:255|exists:academic_years,id',
            'academic_degree_id'=>'nullable|string|max:255|exists:academic_degrees,id',
            'academic_semester_id'=>'nullable|string|max:255|exists:academic_semesters,id',
        ];
    }



    protected function prepareForValidation()
    {
        $this->merge([
            'active' => (bool) $this->active,
        ]);
    }
}
