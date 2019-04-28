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


    /** @test */
    public function has_a_path()
    {
        $category = factory('App\Category')->create();

        $this->assertEquals($category->path(), route('categories.show', $category));
    }

    /** @test */
    public function has_a_unique_slug()
    {
        $category = factory('App\Category')->create(['name' => 'test']);

        $duplicateCategory = factory('App\Category')->create(['name' => 'test']);

        $this->assertNotEquals($category->slug, $duplicateCategory->slug);
    }

    /** @test */
    public function returns_all_category_parents()
    {
        $parentCategory = factory('App\Category')->create();
        $category = factory('App\Category')->create(['parent_id' => $parentCategory->id]);

        $this->assertEquals(
            collect($category->getParents())->pluck('name')->toArray(),
            [$parentCategory->name, $category->name]
        );
    }
}
