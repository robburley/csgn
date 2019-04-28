<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\ArticleView;
use Faker\Generator as Faker;

$factory->define(ArticleView::class, function (Faker $faker) {
    return [
        'article_id' => factory('App\Article'),
        'ip_address' => $faker->ipv4,
        'browser' => $faker->userAgent,
    ];
});
