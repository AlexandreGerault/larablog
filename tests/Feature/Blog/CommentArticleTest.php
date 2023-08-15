<?php

use Database\Factories\ArticleFactory;
use Database\Factories\UserFactory;
use Symfony\Component\DomCrawler\Crawler;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;

it('shows the comment form', function () {
    $article = ArticleFactory::new()->published()->create();
    $commentRoute = route('article.comment', $article);

    $response = actingAs(UserFactory::new()->create())
        ->get(route('article.show', $article))
        ->assertSuccessful();

    $crawler = new Crawler($response->content());

    expect($crawler->filter('form[method="post"][action="' . $commentRoute . '"]')->count())->toBe(1)
        ->and($crawler->filter('input[name="email"]')->count())->toBe(1)
        ->and($crawler->filter('input[name="name"]')->count())->toBe(1)
        ->and($crawler->filter('textarea[name="content"]')->count())->toBe(1);
});

it('comments an article', function () {
    $article = ArticleFactory::new()->create();

    actingAs(UserFactory::new()->create())
        ->post(route('article.comment', $article), [
            'email' => 'john@doe.com',
            'name' => 'John Doe',
            'content' => 'My comment'
        ])
        ->assertRedirect();

    assertDatabaseHas('comments', [
        'article_id' => $article->id,
        'email' => 'john@doe.com',
        'name' => 'John Doe',
        'content' => 'My comment',
    ]);
});
