<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Rules\Publish_date_Rule;
use App\Rules\SlugRule;
use App\Rules\KeywordRule;

class UpdatePostRequest extends StorePostRequest
{
    public function rules() :array
    {
        $postId = $this->route('post')->id ?? null;

        return [
            'title' =>'nullable|string|max:255', 
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('posts')->ignore($postId), new SlugRule()],
            'body' => 'required|string',
            'is_published' => 'required|boolean',
            'publish_date' => ['nullable', 'date', new Publish_date_Rule],
            'meta_description' => 'nullable|string|max:255',
            'tags' => 'nullable|string',
            'keywords' => ['nullable', 'string', new KeywordRule(5)],
        ];
    }
}


