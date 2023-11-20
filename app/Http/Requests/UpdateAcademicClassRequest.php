<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAcademicClassRequest extends FormRequest
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
            'class_code'=>'required|string|max:255',
            'class_name_noor'=>'required|string|max:255',
            'class_name'=>'nullable|string|max:255',
            'class_name_latin'=>'nullable|string|max:255',
            'class_description'=>'nullable|string|max:255',
            'class_description_latin'=>'nullable|string|max:255',
            'academic_year_id'=>'nullable|string|max:255|exists:academic_years,id',
            'academic_degree_id'=>'nullable|string|max:255|exists:academic_degrees,id',
            'class_id'=>'nullable|string|max:255|exists:classes,id',
            'room_id'=>'nullable|string|max:255|exists:rooms,id',
            'class_active_date'=>'nullable|date',
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
