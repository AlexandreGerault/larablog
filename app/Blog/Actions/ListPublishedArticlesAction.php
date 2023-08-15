<?php

namespace App\Blog\Actions;

use App\Models\Article;
use App\Models\Article\ArticlePublishedStatus;
use Illuminate\Pagination\LengthAwarePaginator;

class ListPublishedArticlesAction
{
    public function __invoke(int $perPage): LengthAwarePaginator
    {
        return Article::query()
            ->where('published', '=', ArticlePublishedStatus::Published)
            ->paginate($perPage);
    }
}
