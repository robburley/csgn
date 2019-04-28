<?php


Route::get('/', 'HomeController@index')->name('home');

Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');
