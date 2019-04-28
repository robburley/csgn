<?php

namespace Tests\Unit;

use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TagTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function has_a_path()
    {
        $category = factory('App\Tag')->create();

        $this->assertEquals($category->path(), route('tags.show', $category));
    }

    /** @test */
    public function has_a_slug()
    {
        $tag = factory('App\Tag')->create(['name' => 'test']);

        $this->assertTrue($tag->slug == 'test');
    }

    /** @test */
    public function has_a_unique_slug()
    {
        $this->expectException(QueryException::class);

        factory('App\Tag')->create(['name' => 'test']);

        factory('App\Tag')->create(['name' => 'test']);
    }
}
