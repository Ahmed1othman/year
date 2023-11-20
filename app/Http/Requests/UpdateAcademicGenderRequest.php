<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAcademicGenderRequest extends FormRequest
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
            'gender_start_date'=>'nullable|data',
            'gender_end_date'=>'nullable|data',
            'gender_active_date'=>'nullable|data',
            'gender_successful_transfer_date'=>'nullable|data',
            'gender_hijri_start_date'=>'nullable|string',
            'gender_hijri_end_date'=>'nullable|string',
            'academic_year_id'=>'nullable|string|max:255|exists:academic_years,id',
            'gender_id'=>'nullable|string|max:255|exists:genders,id',
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
