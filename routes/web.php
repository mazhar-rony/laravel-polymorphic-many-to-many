<?php

Route::get('/', function () {
    return view('welcome');
});

Route::resource('videos','VideosController');

Route::resource('posts','PostsController');

Route::resource('tags','TagsController');

Route::post('/videos/{id}/tags','TagsController@videoTags');

Route::post('/posts/{id}/tags','TagsController@postTags');
