<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Gate defined in app/Providers/AuthServiceProvider.php
        return $this->user()->can('create-user');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'role' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'role.required' => 'A role is required',
            'name.required' => 'A name is required',
            'email.email' => 'The email is not in a valid format',
            'email.unique' => 'There is already a user with that email address',
            'password.required' => 'A password is required',
            'password.confirmed' => 'Your passwords dont match',
        ];
    }
}
