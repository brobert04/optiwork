<?php

namespace App\Http\Requests\employer;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'department' => 'required',
            'phone' => 'required'
        ];

    }

    public function messages(){
        return [
          'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'email.unique' => 'Email already exists',
            'department.required' => 'Department is required',
            'phone.required' => 'Phone is required'
        ];
    }
}
