<?php

namespace App\Models;

use App\Models\Article\ArticlePublishedStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'chapo',
        'content',
        'published',
    ];

    protected $casts = [
        'published' => ArticlePublishedStatus::class,
    ];

    protected static function booted()
    {
        static::saving(function (Article $article) {
            $article->slug = Str::slug($article->title);

            return $article;
        });
    }

    public function isPublished(): bool
    {
        return $this->published === ArticlePublishedStatus::Published;
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
