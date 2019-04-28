<?php


namespace Tests\SetUp;

class ArticleFactory
{
    public function create($attributes = [])
    {
        return factory('App\Article')->create($attributes);
    }
}
