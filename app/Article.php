<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = ['id'];

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
}
