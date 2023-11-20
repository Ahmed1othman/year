<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAcademicBranchRequest extends FormRequest
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
            'branch_start_date'=>'nullable|data',
            'branch_end_date'=>'nullable|data',
            'branch_active_date'=>'nullable|data',
            'branch_hijri_start_date'=>'nullable|string',
            'branch_hijri_end_date'=>'nullable|string',
            'academic_year_id'=>'nullable|string|max:255|exists:academic_years,id',
            'academic_gender_id'=>'nullable|string|max:255|exists:academic_genders,id',
            'branch_id'=>'nullable|string|max:255|exists:branches,id',
        ];
    }



    protected function prepareForValidation()
    {
        $this->merge([
            'active' => (bool) $this->active,
            'current_academic_year' => (bool) $this->active,
        ]);
    }
}
