<?php

use App\Filament\Resources\ArticleResource;
use Database\Factories\UserFactory;
use Livewire\Livewire;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;

it('shows the form to write an article', function () {
    actingAs(UserFactory::new()->create())
        ->get(ArticleResource::getUrl('create'))
        ->assertOk();
});

it('writes an article and saves it', function () {
    Livewire::test(ArticleResource\Pages\CreateArticle::class)
        ->assertFormExists()
        ->fillForm([
            'title' => 'Article',
            'chapo' => 'My article chapo',
            'content' => 'My test article',
            'published' => 'published'
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    assertDatabaseHas('articles', [
        'title' => 'Article',
        'slug' => 'article',
        'content' => 'My test article',
        'published' => 'published'
    ]);
});
