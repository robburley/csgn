<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function only_show_published_articles()
    {
        $article = factory('App\Article')->create(['published_at' => null]);

        $this->get('/')
            ->assertDontSee($article->title);
    }

    /** @test */
    public function see_articles()
    {
        $articles = factory('App\Article', 3)
            ->create()
            ->sortByDesc('published_at');

        $article = factory('App\Article')->create();
        factory('App\ArticleView')->create(['article_id' => $article->id]);

        $this->get('/')
            ->assertSeeInOrder($articles->pluck('title')->toArray());
    }

    /** @test */
    public function see_most_popular_article()
    {
        $articles = factory('App\Article', 3)->create()->sortByDesc('published_at');
        $article = factory('App\Article')->create();
        factory('App\ArticleView')->create(['article_id' => $article->id]);

        $this->get('/')
            ->assertSee($article->title)
            ->assertSeeInOrder($articles->pluck('title')->toArray());
    }

    /** @test */
    public function see_top_level_categories()
    {
        $categories = factory('App\Category', 5)->create();

        $childCategories = $categories->map(function ($category) {
            return factory('App\Category')->create(['parent_id' => $category->id]);
        });

        $this->get('/')
            ->assertSeeInOrder($categories->sortBy('name')->pluck('name')->toArray())
            ->assertDontSee($childCategories->first()->name);
    }
}
