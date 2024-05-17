<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'username' => 'required|max:255',
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required|max:255|confirmed',
            'department_id' => 'required',
            'status_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => ':attribute cannot be empty !',
            'username.max' => ':attribute only contain 255 characters !',

            'name.required' => ':attribute cannot be empty !',
            'name.max' => ':attribute only contain 255 characters !',

            'email.email' => ':attribute invalid. Please enter again !',
            'email.required' => ':attribute cannot be empty !',
            'email.max' => ':attribute only contain 255 characters !',
            'email.unique' => ':attribute already used !',

            'password.required' => ':attribute cannot be empty !',
            'password.confirmed' => 'Confirm password invalid !',

            'department_id.required' => ':attribute cannot be empty !',
            'status_id.required' => ':attribute cannot be empty !',
        ];
    }

    public function attributes()
    {
        return [
            'username' => 'Username',
            'name' => 'Fullname',
            'email' => 'Email',
            'password' => 'Password',
            'department_id' => 'Department',
            'status_id' => 'Status',
        ];
    }
}
