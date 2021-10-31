<?php

$router->get('/', 'PageController@home');
$router->get('/about', 'PageController@about');

$router->get('/pages/new', 'PageController@new');
$router->post('/pages', 'PageController@create');
$router->get('/pages/{id}', 'PageController@show');
$router->get('/pages/{id}/edit', 'PageController@edit');
$router->post('/pages/{id}', 'PageController@update');
$router->post('/pages/{id}/delete', 'PageController@destroy');

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
$router->get('/users/{id}', 'UserController@show');
$router->post('/users/{id}', 'UserController@update');
$router->post('/logout', 'UserController@logout');
$router->post('/users/{id}/delete', 'UserController@destroy');

$router->post('/posts/{id}/comment', 'CommentController@create');

$router->get('/admin', 'AdminController@admin');
$router->get('/admin/posts', 'AdminController@posts');
$router->get('/admin/users', 'AdminController@users');
$router->get('/admin/pages', 'AdminController@pages');
