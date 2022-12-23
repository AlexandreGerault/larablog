<?php

use Database\Factories\ArticleFactory;
use function Pest\Laravel\get;

it('denies access to an unpublished article', function () {
    $unpublishedArticle = ArticleFactory::new()->unpublished()->create();

    get(route('article.show', $unpublishedArticle))->assertNotFound();
});

it('shows a published article', function () {
    $publishedArticle = ArticleFactory::new()->published()->create();

    get(route('article.show', $publishedArticle))
        ->assertOk()
        ->assertSee($publishedArticle->title);
});
