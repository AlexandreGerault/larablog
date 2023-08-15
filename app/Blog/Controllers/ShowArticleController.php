<?php

namespace App\Blog\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\View;

class ShowArticleController
{
    public function __invoke(Article $article): View
    {
        if (! $article->isPublished()) {
            abort(404);
        }

        $article->load('comments');
        $comments = $article->comments()->orderBy('created_at', 'desc')->get();

        return view('articles.show', [
            'article' => $article,
            'comments' => $comments,
        ]);
    }
}
