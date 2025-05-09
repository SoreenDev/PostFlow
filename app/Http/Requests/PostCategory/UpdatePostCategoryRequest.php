<?php

namespace App\Http\Requests\PostCategory;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePostCategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $post_category =  $this->route('post_category');
        return [
            'name' => ['string', 'min:5', 'max:255', 'unique:post_categories,name,'.$post_category->id],
        ];
    }
}
