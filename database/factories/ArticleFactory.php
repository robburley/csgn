<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(10),
        'headline' => $faker->sentence(10),
        'content' => collect($faker->paragraphs(10))->implode('<br><br>'),
        'published_at' => $faker->dateTimeThisMonth,
        'category_id' => factory('App\Category'),
        'creator_id' => factory('App\User'),
    ];
});
