<?php

namespace App\Http\Requests\Post;

use App\Enums\PermissionEnum;
use App\Enums\PostStatusEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class UpdatePostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $post = $this->route('post');
        return [
            'category_id' => ['numeric', 'exists:post_categories,id'],
            'title' => ['string', 'min:8', 'max:255', 'unique:posts,title,'.$post->id],
            'content' => ['string'],
            'status' => [
                Rule::when(
                    auth()->user()->hasPermissionTo(PermissionEnum::Post),
                    ['integer', new Enum(PostStatusEnum::class)],
                    ['prohibited']
                )
            ],
            'tags' => ['nullable', 'array', 'distinct'],
            'tags.*' => ['required', 'numeric', 'exists:tags,id'],
            'main_image' => ['file', 'mimes:jpg,png', 'max:10240'],
            'gallery' => ['nullable','array'],
            'gallery*' =>  ['required','file', 'mimes:jpg,png', 'max:10240']
        ];
    }
}
