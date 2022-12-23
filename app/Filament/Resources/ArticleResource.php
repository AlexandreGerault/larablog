<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use App\Models\Article\ArticlePublishedStatus;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Spatie\FilamentMarkdownEditor\MarkdownEditor;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->autofocus()
                    ->required(),
                Forms\Components\Select::make('published')
                    ->options(ArticlePublishedStatus::asSelectArray())
                    ->required(),
                Forms\Components\Textarea::make('chapo')
                    ->required(),
                MarkdownEditor::make('content')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('published')
                    ->enum([
                        ArticlePublishedStatus::Published->value => ArticlePublishedStatus::Published->label(),
                        ArticlePublishedStatus::Unpublished->value => ArticlePublishedStatus::Unpublished->label(),
                    ])
                    ->colors([
                        'primary',
                        ArticlePublishedStatus::Published->color() => ArticlePublishedStatus::Published->value,
                        ArticlePublishedStatus::Unpublished->color() => ArticlePublishedStatus::Unpublished->value,
                    ])
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('published')
                    ->options(ArticlePublishedStatus::asSelectArray()),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/rediger-un-nouvel-article'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
