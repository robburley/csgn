<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function has_a_category()
    {
        $this->withExceptionHandling();
        
        $article = factory('App\Article')->create();

        $this->assertInstanceOf('App\Category', $article->category);
    }
}
