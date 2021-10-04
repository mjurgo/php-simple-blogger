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

$router->get('/register', 'UserController@register');
$router->post('/users', 'UserController@create');
$router->get('/login', 'UserController@login');
$router->post('/login', 'UserController@authenticate');
$router->post('/logout', 'UserController@logout');
$router->post('/users/{id}/delete', 'UserController@destroy');

$router->post('/posts/{id}/comment', 'CommentController@create');

$router->get('/admin', 'AdminController@admin');
$router->get('/admin/posts', 'AdminController@posts');
$router->get('/admin/users', 'AdminController@users');
