<?php

namespace App\Http\Requests\User;

use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;
use App\Enums\UserGenderEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class UpdateUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $user = $this->route('user');
        return [
            'user_name' => ['string', 'min:5', 'max:255', 'unique:users,user_name,'.$user->id],
            'email' => [
                Rule::when(
                    auth()->user()->hasPermissionTo(PermissionEnum::UserUpdate),
                    ['string', 'email', 'max:255', 'unique:users,email,'.$user->id],
                    ['prohibited']
                )],
            'password' => ['string', 'confirmed', 'min:8', 'max:16'],
            'role' => [
                Rule::when(
                    auth()->user()->hasRole(RoleEnum::SuperADMIN->value),
                    ['nullable', 'string', new Enum(RoleEnum::class)],
                    ['prohibited']
                )
            ],
            'profile' => ['file', 'mimes:jpg,png', 'max:10240'],
            'information' => ['nullable', 'array'],
            'information.first_name' => ['min:5', 'max:255'],
            'information.last_name' => ['min:5', 'max:255'],
            'information.gender' => ['integer', new Enum(UserGenderEnum::class)],
        ];
    }
}
