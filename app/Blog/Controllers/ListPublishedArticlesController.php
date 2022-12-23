<?php

namespace App\Blog\Controllers;

use App\Blog\Actions\ListPublishedArticlesAction;
use Illuminate\Contracts\View\View;

class ListPublishedArticlesController
{
    private const ARTICLE_PER_PAGE = 12;

    public function __invoke(ListPublishedArticlesAction $action): View
    {
        return view('articles.index', [
            'articles' => $action(self::ARTICLE_PER_PAGE),
        ]);
    }
}
