<?php

namespace App\Http\Controllers;

use App\Article;

class ArticlesController extends Controller
{
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }
}
