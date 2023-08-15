<?php

namespace App\Blog\Controllers\CommentArticle;

use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentArticleController
{
    public function __invoke(Article $article, CommentArticleRequest $request): RedirectResponse
    {
        $article->comments()->create($request->validated());

        return redirect()->back();
    }
}
