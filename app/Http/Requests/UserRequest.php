<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'username' => 'required|alpha_num|max:255',
            'email' =>  ['required','email', Rule::unique('users')->ignore($this->route('user')),]
        ];
    }
    public function message(): array
    {
        return [
            'name.required' => 'name is required',
            'username.required' => 'UserName is required',
            'email.required' => 'Email is required',
            'email.unique' => 'This email is already taken',
        ];
    }
}
