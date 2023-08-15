<?php

declare(strict_types=1);

use App\Filament\Resources\ArticleResource\RelationManagers\CommentsRelationManager;
use App\Filament\Resources\CommentResource\Pages\EditComment;
use Database\Factories\ArticleFactory;
use Database\Factories\CommentFactory;

use function Pest\Livewire\livewire;

it('lists comments on article page', function () {
    $article = ArticleFactory::new()->create();

    $comments = CommentFactory::new()->for($article)->count(3)->create();

    livewire(
        CommentsRelationManager::class,
        ['ownerRecord' => $article]
    )
        ->assertSuccessful()
        ->assertCanSeeTableRecords($comments);
});

it('deletes a comment from table action', function () {
    $article = ArticleFactory::new()->create();

    $comment = CommentFactory::new()->for($article)->create();

    livewire(
        CommentsRelationManager::class,
        ['ownerRecord' => $article]
    )
        ->assertSuccessful()
        ->callTableAction('delete', $comment);

    expect($article->comments()->count())->toBe(0);
});

it('deletes comments from table bulk action', function () {
    $article = ArticleFactory::new()->create();

    $comments = CommentFactory::new()->for($article)->count(3)->create();

    livewire(
        CommentsRelationManager::class,
        ['ownerRecord' => $article]
    )
        ->assertSuccessful()
        ->callTableBulkAction('delete', $comments);

    expect($article->comments()->count())->toBe(0);
});

it('can delete a comment from the edit page', function () {
    $article = ArticleFactory::new()->create();

    $comment = CommentFactory::new()->for($article)->create();

    livewire(
        EditComment::class,
        ['record' => $comment->id]
    )
        ->assertSuccessful()
        ->callPageAction('delete');

    expect($article->comments()->count())->toBe(0);
});
