<?php

Route::get('/', 'BlogController@getIndex');


Route::get('/signup', 'BlogController@getSignup');
Route::get('/login', 'BlogController@getLogin');
Route::get('/newPost', 'BlogController@getNewPost');
Route::get('/logout', 'BlogController@getLogout');

Route::post('/signup', 'BlogController@postSignup');
Route::post('/login', 'BlogController@postLogin');
Route::post('/newPost', 'BlogController@postNewPost');



