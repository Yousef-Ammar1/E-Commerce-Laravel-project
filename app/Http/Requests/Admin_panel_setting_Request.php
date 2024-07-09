<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Admin_panel_setting_Request extends FormRequest
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
    // dd(request()->all());
        return [
            'system_name' =>'required',
            'address' => 'required',
            'phone' => 'required',
        ];
    }

    public function messages(): array
    {

        return [
            'system_name.required' => 'System_name is required',
            'address.required' => 'Address is required',
            'phone.required' => 'Phone is required',
        ];
    }
}
