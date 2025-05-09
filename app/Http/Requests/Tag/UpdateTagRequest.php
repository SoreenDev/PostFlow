<?php

namespace App\Http\Requests\Tag;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTagRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $tag =  $this->route('tag');
        return [
            'name' => ['string', 'min:5', 'max:255', 'unique:tags,name,'.$tag->id],
        ];
    }
}
