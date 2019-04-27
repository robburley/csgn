<?php

namespace App\Http\Controllers;

use App\Article;

class HomeController extends Controller
{
    public function index()
    {
        $featured = Article::orderByDesc('views')
            ->first();

        $articles = Article::latest('published_at')
            ->where('id', '!=', optional($featured)->id)
            ->take(4)
            ->get();

        return view('home', compact('articles', 'featured'));
    }
}
