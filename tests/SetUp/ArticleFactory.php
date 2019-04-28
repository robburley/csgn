<?php


namespace Tests\SetUp;

class ArticleFactory
{
    public function create($attributes = [], $count = 0)
    {
        if ($count) {
            return factory('App\Article', $count)->create($attributes);
        }

        return factory('App\Article')->create($attributes);
    }
}
