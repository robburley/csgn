<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use Sluggable;

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function views()
    {
        return $this->hasMany(ArticleView::class);
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }

    public function path()
    {
        return route('articles.show', $this);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }
}
