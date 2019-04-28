<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_have_parent_category()
    {
        $this->withExceptionHandling();

        $comment = factory('App\Category')->create();
        $childCategory = factory('App\Category')->create(['parent_id' => $comment->id]);

        $this->assertCount(1, $comment->children);

        $this->assertTrue($comment->children->contains($childCategory));

        $this->assertInstanceOf('App\Category', $childCategory->parent);

        $this->assertTrue($childCategory->parent->is($comment));
    }
}
