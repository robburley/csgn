<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use Sluggable, SoftDeletes;

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
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

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id')
            ->withTrashed();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }

    public function path()
    {
        return route('articles.show', $this);
    }

    public function relatedArticles()
    {
        $related = $this->category->articles()
            ->where('id', '!=', $this->id)
            ->latest()
            ->take(4)
            ->get();

        return $related->count()
            ? $related
            : Article::inRandomOrder()->take(4)->get();
    }
}
