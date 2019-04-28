<?php

use App\Article;
use App\ArticleView;
use App\Comment;
use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;

class ArticlesSeeder extends Seeder
{
    use WithFaker;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->setUpFaker();

        $tags = factory(Tag::class, 10)->create();

        factory(Article::class, 10)->create()
            ->each(function ($article) use ($tags) {
                factory(ArticleView::class, $this->faker->numberBetween(0, 100))->create(['article_id' => $article->id]);
                factory(Comment::class, $this->faker->numberBetween(0, 100))->create(['article_id' => $article->id]);

                $article->tags()->attach($tags->shuffle()->take(5));
            });
    }
}
