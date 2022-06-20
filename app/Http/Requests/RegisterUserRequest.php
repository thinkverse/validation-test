<?php

namespace App\Http\Requests;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', User::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'role' => ['required', new Rules\Enum(Role::class)],
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
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
            'role.enum' => 'The role must be a valid role',
            'name.required' => 'A name is required',
            'name.string' => 'The name must be a string',
            'name.max' => 'The name must be less than :max characters',
            'username.required' => 'A username is required',
            'username.string' => 'The username must be a string',
            'username.max' => 'The username must be less than :max characters',
            'username.unique' => 'The username must be unique',
            'email.required' => 'An email is required',
            'email.string' => 'The email must be a string',
            'email.email' => 'The email must be a valid email address',
            'email.unique' => 'There is already a user with that email address',
            'password.required' => 'A password is required',
            'password.confirmed' => 'Your passwords dont match',
        ];
    }
}
