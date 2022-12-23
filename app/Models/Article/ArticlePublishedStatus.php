<?php

namespace App\Models\Article;

enum ArticlePublishedStatus: string
{
    case Published = 'published';
    case Unpublished = 'unpublished';

    public static function asSelectArray(): array
    {
        return [
            self::Published->value => self::Published->label(),
            self::Unpublished->value => self::Unpublished->label(),
        ];
    }

    public function color(): string
    {
        return match ($this) {
            self::Published => 'success',
            self::Unpublished => 'danger',
        };
    }

    public function label(): string
    {
        return match ($this) {
            self::Published => 'Published',
            self::Unpublished => 'Unpublished',
        };
    }
}
