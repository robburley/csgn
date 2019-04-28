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
}
