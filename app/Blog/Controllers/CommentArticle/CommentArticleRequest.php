<?php

namespace App\Blog\Controllers\CommentArticle;

use Illuminate\Foundation\Http\FormRequest;

class CommentArticleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'name' => ['required', 'string'],
            'content' => ['required', 'string']
        ];
    }
}
