<?php

use Database\Factories\ArticleFactory;
use Symfony\Component\DomCrawler\Crawler;
use function Pest\Laravel\get;

it('list articles on blog index page', function () {
    get(route('article.index'))
        ->assertOk()
        ->assertSee('Derniers articles publiés')
    ;
});

it('list only published articles', function () {
    $publishedArticle = ArticleFactory::new()
        ->published()
        ->create();

    $unpublishedArticle = ArticleFactory::new()
        ->unpublished()
        ->create();

    get(route('article.index'))
        ->assertOk()
        ->assertSee($publishedArticle->title)
        ->assertDontSee($unpublishedArticle->title);
});

it('limits the number of article per page', function () {
    ArticleFactory::new()->published()->count(100)->create();

    $response = get(route('article.index'))->assertOk();

    $crawler = new Crawler($response->content());

    expect($crawler->filter('article')->count())->toBe(12);
});
