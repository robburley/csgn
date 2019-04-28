<?php

namespace App\Http\Controllers;

use App\Article;

class HomeController extends Controller
{
    public function index()
    {
        $featured = Article::published()
            ->withCount([
                'comments',
                'views',
            ])
            ->orderByDesc('views_count')
            ->first();

        $articles = Article::withCount('comments')
            ->latest('published_at')
            ->published()
            ->where('id', '!=', optional($featured)->id)
            ->take(3)
            ->get();

        return view('home', compact(['articles', 'featured']));
    }
}
