<?php

$router->get('/', 'PageController@home');
$router->get('/about', 'PageController@about');

$router->get('/posts', 'PostController@index');
$router->get('/posts/{id}', 'PostController@show');
