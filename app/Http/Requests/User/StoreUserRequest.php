<?php

namespace App\Http\Requests\User;

use App\Enums\RoleEnum;
use App\Enums\UserGenderEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

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
            'user_name' => ['required', 'string', 'min:5', 'max:255', 'unique:users,user_name'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed', 'min:8', 'max:16'],
            'role' => ['nullable', 'string', new Enum(RoleEnum::class)],
            'profile' => ['required', 'file', 'mimes:jpg,png', 'max:10240'],
            'information' => ['nullable', 'array'],
            'information.first_name' => ['required', 'min:5', 'max:255'],
            'information.last_name' => ['required', 'min:5', 'max:255'],
            'information.gender' => ['required', 'integer', new Enum(UserGenderEnum::class)],
        ];
    }
}
