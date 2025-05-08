<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class IndexOptionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'perPage' => ['nullable', 'nullable', 'max:300'],
            'page' => ['nullable', 'numeric'],
            'columns' => ['nullable', 'array'],
            'columns.*' => ['string', 'max:40', 'distinct']
        ];
    }
}
