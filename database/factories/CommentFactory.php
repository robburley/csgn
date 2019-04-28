<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'article_id' => factory('App\Article'),
        'message' => $faker->paragraph(2),
        'email' => $faker->safeEmail,
        'name' => $faker->name,
    ];
});
