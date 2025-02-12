<?php

namespace App\Http\Requests\Api\User;

use App\Enums\PermissionEnum;
use App\Repositories\UserMetaRepository;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = $this->route('id');
        $userMetaId = UserMetaRepository::findByUserId($userId)->id ;

        return [
            'role_id' => [
                Rule::when(
                    auth()->user()->hasPermissionTo(PermissionEnum::SetRole) && auth()->id() !== $userId,
                    ['nullable', 'numeric', 'exists:roles,id'],
                    ['prohibited']
                ),
            ],
            'user_name' => ['nullable' ,'string', 'min:5','max:255', 'unique:user_meta,user_name,'. $userMetaId],
            'first_name' => ['nullable' ,'string', 'min:3','max:255'],
            'last_name' => ['nullable' ,'string', 'min:3','max:255'],
            'email' => ['nullable', 'email', 'max:254', 'unique:users,email,'. $userId],
            'password' => ['required', 'string' ,'min:8','max:255', 'confirmed'],
            'profile_path' => ['nullable', 'file', 'mimes:jpg,png', 'max:10240']
        ];
    }
}
