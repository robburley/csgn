<?php


Route::get('/', 'HomeController@index')->name('home');

Route::get('/articles/{web_article}', 'ArticlesController@show')->name('articles.show');
Route::get('/categories/{category}', 'CategoriesController@show')->name('categories.show');
