<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAcademicYearRequest extends FormRequest
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
            'academic_year_code'=>'required|string|max:255',
            'academic_year_name'=>'nullable|string|max:255',
            'academic_year_name_latin'=>'nullable|string|max:255',
            'academic_year_hijri_name'=>'nullable|string|max:255',
            'academic_year_name_hijri_latin'=>'nullable|string|max:255',
            'academic_year_description'=>'nullable|string|max:255',
            'academic_year_description_latin'=>'nullable|string|max:255',
            'academic_year_start_date'=>'nullable|data',
            'academic_year_end_date'=>'nullable|data',
            'academic_year_active_date'=>'nullable|data',
            'admission_date'=>'nullable|data',
            'academic_year_successful_transfer_date'=>'nullable|data',
            'academic_year_hijri_start_date'=>'nullable|string',
            'academic_year_hijri_end_date'=>'nullable|string',
            'school_id'=>'nullable|string|max:255|exists:schools,id',
            'school_hub_id'=>'nullable|string|max:255|exists:school_hubs,id',
            'previous_year_id'=>'nullable|string|max:255|exists:academic_years,id',
        ];
    }



    protected function prepareForValidation()
    {
        $this->merge([
            'active' => (bool) $this->active,
            'is_open_for_admission' => (bool) $this->is_open_for_admission,
            'current_academic_year' => (bool) $this->current_academic_year,
        ]);
    }
}
