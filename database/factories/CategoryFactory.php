<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'parent_id' => null,
        'name' => $word = $faker->unique()->word,
        'slug' => STR::slug($word),
    ];
});
