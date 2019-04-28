<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewArticleTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function a_published_article_can_be_viewed()
    {
        $article = factory('App\Article')->create();

        $this->get($article->path())
            ->assertStatus(200)
            ->assertSee($article->title);
    }

    /** @test */
    public function an_unpublished_article_cannot_be_viewed()
    {
        $article = factory('App\Article')->create(['published_at' => null]);

        $this->get($article->path())
            ->assertStatus(404);
    }

    /** @test */
    public function shows_its_categories()
    {
        $article = factory('App\Article')->create();

        $this->get($article->path())
            ->assertSee($article->category->name);
    }

    /** @test */
    public function shows_a_headline()
    {
        $article = factory('App\Article')->create();

        $this->assertNotNull($article->headline);

        $this->get($article->path())
            ->assertSee($article->headline);
    }

    /** @test */
    public function shows_a_creator()
    {
        $article = factory('App\Article')->create();

        $this->assertNotNull($article->creator);

        $this->get($article->path())
            ->assertSee($article->creator->name);
    }

    /** @test */
    public function shows_a_updated_date()
    {
        $article = factory('App\Article')->create();

        $this->get($article->path())
            ->assertSee($article->creator->updated_at->format('d F Y H:i'));
    }

    /** @test */
    public function shows_a_content()
    {
        $article = factory('App\Article')->create();

        $this->assertNotNull($article->content);

        $this->get($article->path())
            ->assertSee($article->content);
    }

    /** @test */
    public function shows_related_articles()
    {
        $article1 = factory('App\Article')->create();
        $article2 = factory('App\Article')->create(['category_id' => $article1->category_id]);

        $this->assertEquals($article1->relatedArticles()->first()->id, $article2->id);

        $this->get($article1->path())
            ->assertSee($article2->title);
    }
}
