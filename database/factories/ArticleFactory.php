<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'views' => $faker->numberBetween(0, 1000),
        'published_at' => $faker->dateTimeThisMonth,
        'category_id' => factory('App\Category'),
    ];
});
