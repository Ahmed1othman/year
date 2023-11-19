<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSchoolRequest extends FormRequest
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
            'school_code'=>'required|string|max:255',
            'school_name'=>'nullable|string|max:255',
            'school_name_latin'=>'nullable|string|max:255',
            'school_description'=>'nullable|string|max:255',
            'school_description_latin'=>'nullable|string|max:255',
            'org_id'=>'required|string|max:255|exists:organizations,id',
            'school_hub_id'=>'nullable|string|max:255|exists:school_hubs,id',
            'city'=>'required|nullable|max:255',
            'address_line_1'=>'nullable|string|max:255',
            'address_line_2'=>'nullable|string|max:255',
            'postal_code'=>'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png|max:5000',
        ];
    }



    protected function prepareForValidation()
    {
        $this->merge([
            'active' => (bool) $this->active,
        ]);
    }
}
