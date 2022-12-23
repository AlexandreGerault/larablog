<?php

use App\Filament\Resources\ArticleResource;
use App\Models\Article\ArticlePublishedStatus;
use Database\Factories\ArticleFactory;
use Database\Factories\UserFactory;
use function Pest\Laravel\actingAs;

it("renders the admin index page", function () {
    $articles = ArticleFactory::new()->count(10)->create();

    actingAs(UserFactory::new()->create())
        ->get(ArticleResource::getUrl())
        ->assertOk()
        ->assertSee("Articles");

    Livewire::test(ArticleResource\Pages\ListArticles::class)
        ->assertCanSeeTableRecords($articles);
});

it('filters only published articles', function () {
    $publishedArticle = ArticleFactory::new()->published()->create();
    $unpublishedArticle = ArticleFactory::new()->unpublished()->create();

    Livewire::test(ArticleResource\Pages\ListArticles::class)
        ->filterTable('published', ArticlePublishedStatus::Published->value)
        ->assertCanSeeTableRecords([$publishedArticle])
        ->assertCanNotSeeTableRecords([$unpublishedArticle]);
});

it('searches by title', function () {
    $article = ArticleFactory::new()->create();

    Livewire::test(ArticleResource\Pages\ListArticles::class)
        ->searchTable($article->title)
        ->assertCanSeeTableRecords([$article]);

    Livewire::test(ArticleResource\Pages\ListArticles::class)
        ->searchTable('not found')
        ->assertCanNotSeeTableRecords([$article]);
});
