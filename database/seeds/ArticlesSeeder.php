<?php

use App\Article;
use App\ArticleView;
use App\Comment;
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

        factory(Article::class, 10)->create()
            ->each(function ($article) {
                factory(ArticleView::class, $this->faker->numberBetween(0, 100))->create(['article_id' => $article->id]);
                factory(Comment::class, $this->faker->numberBetween(0, 100))->create(['article_id' => $article->id]);
            });
    }
}
