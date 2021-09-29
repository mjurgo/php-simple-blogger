<?php

$router->get('/', 'PageController@home');
$router->get('/about', 'PageController@about');

$router->get('/posts', 'PostController@index');
$router->get('/posts/{id}', 'PostController@show');
$router->get('/posts/new', 'PostController@new');
$router->post('/posts', 'PostController@create');
$router->get('/posts/{id}/edit', 'PostController@edit');
$router->post('/posts/{id}', 'PostController@update');
$router->post('/posts/{id}/delete', 'PostController@destroy');
