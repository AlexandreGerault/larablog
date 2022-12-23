<?php

use App\Filament\Resources\ArticleResource;
use App\Filament\Resources\ArticleResource\Pages\EditArticle;
use Database\Factories\ArticleFactory;
use Database\Factories\UserFactory;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;

it('shows edit article page', function () {
    $article = ArticleFactory::new()->create();

    actingAs(UserFactory::new()->create())
        ->get(ArticleResource::getUrl('edit', $article))
        ->assertSuccessful();
});

it('edits an article', function () {
    $article = ArticleFactory::new()->create();

    Livewire::test(EditArticle::class, [$article->id])
        ->assertFormExists()
        ->fillForm([
            'title' => 'Edited article',
            'slug' => 'edited-article',
            'chapo' => 'Edited chapo',
            'content' => 'Edited content',
            'published' => 'published',
        ])
        ->assertHasNoFormErrors()
        ->call('save');

    assertDatabaseHas('articles', [
        'title' => 'Edited article',
        'slug' => 'edited-article',
        'chapo' => 'Edited chapo',
        'content' => 'Edited content',
        'published' => 'published',
    ]);
});
