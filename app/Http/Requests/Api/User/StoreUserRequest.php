<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'role_id' => ['nullable' , 'numeric', 'exists:roles,id'],
            'user_name' => ['required' ,'string', 'min:5','max:255', 'unique:user_meta,user_name'],
            'first_name' => ['nullable' ,'string', 'min:3','max:255'],
            'last_name' => ['nullable' ,'string', 'min:3','max:255'],
            'email' => ['required', 'email', 'max:254', 'unique:users,email'],
            'password' => ['required', 'string' ,'min:8','max:255', 'confirmed'],
            'profile_path' =>['nullable', 'file', 'mimes:jpg,png', 'max:10240']
        ];
    }
}
